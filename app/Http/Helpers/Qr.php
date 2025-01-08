<?php

namespace App\Http\Helpers;

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3Exception;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class Qr
{
    public static function generate_qr($url)
    {
        $builder = new Builder(
            writer: new PngWriter(),
            writerOptions: [],
            validateResult: false,
            data: $url,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Low,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin
        );
        $result = $builder->build();
        return $result->getDataUri();
    }

    public static function generate_link($codGen, $fechaEmi, $ambiente = "01")
    {
        return "https://admin.factura.gob.sv/consultaPublica?ambiente=$ambiente&codGen=$codGen&fechaEmi=$fechaEmi";
    }

    public static function generate_link_consulta($urlBase, $codGen, $fechaEmi)
    {
        return "$urlBase?codGeneracion=$codGen&fechaEmi=$fechaEmi";
    }

    public static function download_logo($nit)
    {
        $awsAccessKeyId = env("AWS_ACCESS_KEY_ID");
        $awsSecretAccessKey = env("AWS_SECRET_ACCESS_KEY");
        $awsRegion = env("AWS_DEFAULT_REGION");
        $logoss3Bucket = env("AWS_LOGOS_BUCKET");
    
    
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => $awsRegion,
            'credentials' => [
                'key' => $awsAccessKeyId,
                'secret' => $awsSecretAccessKey
            ]
        ]);
    
        try {
            $result = $s3->listObjectsV2([
                'Bucket' => $logoss3Bucket,
                'Prefix' => $nit
            ]);
        } catch (S3Exception $e) {
            // Manejar el error de la solicitud S3
            error_log("Error al listar objetos: " . $e->getMessage());
            return null;
        }
    
        // Verificar si se encontró la clave 'Contents' y si no está vacía
        if (isset($result['Contents']) && !empty($result['Contents'])) {
            $file = null;
            foreach ($result['Contents'] as $object) {
                if ($object['Key'] !== $nit . '/') {
                    $file = $object['Key'];
                    break;
                }
            }
    
            if ($file) {
                try {
                    $data = $s3->getObject([
                        'Bucket' => $logoss3Bucket,
                        'Key' => $file
                    ]);
                } catch (S3Exception $e) {
                    // Manejar el error de la solicitud S3
                    error_log("Error al obtener el objeto: " . $e->getMessage());
                    return null;
                }
    
                $type = pathinfo($file, PATHINFO_EXTENSION);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data['Body']);
                return $base64;
            } else {
                // No se encontró ningún archivo con el prefijo especificado
                return null;
            }
        } else {
            // No se encontraron contenidos con el prefijo especificado
            return null;
        }
    }
}
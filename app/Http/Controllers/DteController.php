<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelPdf\Facades\Pdf;
use App\Http\Helpers\Qr;
use Illuminate\Support\Facades\Storage;

// use Barryvdh\DomPDF\Facade\Pdf;
class DteController extends Controller
{
    public function generate_pdf(Request $request)
    {
        $pdf = $request->input('documento');
        $object = json_decode($pdf);
        $catalogs = Http::get(env("CATALOGS_API"))->json();
        $catalogs = $this->formatCatalogArray($catalogs);

        if (property_exists($object->emisor, 'nit')) {
            $nit = $object->emisor->nit;
        } else {
            $nit = $object->emisor->numDocumento;
        }
        $logo = Qr::download_logo($nit);
        $link_hacienda = Qr::generate_link(
            $object->identificacion->codigoGeneracion,
            $object->identificacion->fecEmi,
            $object->identificacion->ambiente,
        );

        $link_portal = Qr::generate_link_consulta(
            env('PORTAL_URL'),
            $object->identificacion->codigoGeneracion,
            $object->identificacion->fecEmi,
        );

        $qr_hacienda = Qr::generate_qr($link_hacienda);
        $qr_portal = Qr::generate_qr($link_portal);

        $date = new \DateTime();
        $year = $date->format('Y');
        $month = $date->format('m');
        $day = $date->format('d');
        $codGen = $object->identificacion->codigoGeneracion;
        $keyPrefix = "$nit/$year/$month/$day/$codGen/";

        $filePath = $keyPrefix . $codGen . '.pdf';

        // $pdf = Pdf::loadView('dte', [
        //     'dte' => $object,
        //     'qr_hacienda' => $qr_hacienda,
        //     'qr_portal' => $qr_portal,
        //     'logo' => $logo,
        //     'catalogs' => $catalogs,
        //     'selloRecepcion' => $request->input('selloRecepcion'),
        // ])->setPaper('letter');
        // $pdf->save($filePath, "s3");

        Pdf::view('dte', [
            'dte' => $object,
            'qr_hacienda' => $qr_hacienda,
            'qr_portal' => $qr_portal,
            'logo' => $logo,
            'catalogs' => $catalogs,
            'selloRecepcion' => $request->input('selloRecepcion'),
        ])
            ->format('letter')
            ->disk('s3')->save($filePath);

        $pdf_url = Storage::disk('s3')->url($filePath);

        if ($object->identificacion->tipoDte == "01" || $object->identificacion->tipoDte == "03") {
            // $ticket_pdf = Pdf::loadView('ticket', [
            //     'dte' => $object,
            //     'qr_portal' => $qr_portal,
            //     'logo' => $logo,
            //     'catalogs' => $catalogs,
            //     'selloRecepcion' => $request->input('selloRecepcion'),
            // ])->setPaper([0, 0, 54, 297]);
            // $ticket_pdf->save($keyPrefix . $codGen . '_ticket.pdf', "s3");

            Pdf::view('ticket', [
                'dte' => $object,
                'qr_portal' => $qr_portal,
                'logo' => $logo,
                'catalogs' => $catalogs,
                'selloRecepcion' => $request->input('selloRecepcion'),
            ])
                ->paperSize(54, 297, 'mm')
                ->disk('s3')->save($keyPrefix . $codGen . '_ticket.pdf');

            $ticket_url = Storage::disk('s3')->url($keyPrefix . $codGen . '_ticket.pdf');
        } else {
            $ticket_url = "";
        }


        // Upload the $object as a JSON file to s3
        // $object->selloRecepcion = $request->input('selloRecepcion');
        Storage::disk('s3')->put($keyPrefix . $codGen . '.json', json_encode($object));
        $json_url = Storage::disk('s3')->url($keyPrefix . $codGen . '.json');

        return response()->json([
            'pdf_url' => $pdf_url,
            'ticket_url' => $ticket_url,
            'json_url' => $json_url,
        ]);
    }

    private function formatCatalogArray($data)
    {
        $result = [];

        foreach ($data as $catalogItem) {
            $catalogCode = $catalogItem['catalog'];
            $result[$catalogCode] = [];

            foreach ($catalogItem['values'] as $valueItem) {
                $code = $valueItem['code'];
                $value = $valueItem['value'];
                $result[$catalogCode][$code] = $value;
            }
        }

        return $result;
    }
}

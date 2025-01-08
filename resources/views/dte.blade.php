@extends('layouts.app', ['title' => $dte->identificacion->codigoGeneracion])
@php
    function formatNumber($number)
    {
        // If the number has fewer than 2 decimal places, format to 2 decimal places
        if (strpos($number, '.') === false) {
            // If there's no decimal point, add ".00"
        return number_format($number, 2, '.', ',');
    } elseif (strlen(substr(strrchr($number, '.'), 1)) < 2) {
        // If there is a decimal point but fewer than 2 decimal digits, add trailing zero
        return number_format($number, 2, '.', ',');
    } else {
        // If there are 2 or more decimal digits, format without changing the precision
        return rtrim(rtrim($number, '0'), '.');
        }
    }
@endphp
@section('content')

    <body class="m-9 font-sans text-[7pt] leading-tight">
        {{-- Identificacion --}}
        @include('sections.identificacion', [
            'identificacion' => $dte->identificacion,
            'selloRecepcion' => $selloRecepcion,
            'catalogs' => $catalogs,
            'logo' => $logo,
            'qr_hacienda' => $qr_hacienda,
            'qr_portal' => $qr_portal,
        ])
        {{-- Emisor y Receptor --}}
        @if (in_array($dte->identificacion->tipoDte, ['07', '09']))
            @include('sections.emisor1col', [
                'emisor' => $dte->emisor,
                'receptor' => $dte->receptor,
                'tipoDte' => $dte->identificacion->tipoDte,
                'catalogs' => $catalogs,
            ])
        @elseif($dte->identificacion->tipoDte == '14')
            @include('sections.emisor2cols', [
                'emisor' => $dte->emisor,
                'receptor' => $dte->sujetoExcluido,
                'tipoDte' => $dte->identificacion->tipoDte,
                'catalogs' => $catalogs,
            ])
        @else
            @include('sections.emisor2cols', [
                'emisor' => $dte->emisor,
                'receptor' => $dte->receptor,
                'tipoDte' => $dte->identificacion->tipoDte,
                'catalogs' => $catalogs,
            ])
        @endif
        {{-- Documento Relacionado --}}
        @if (in_array($dte->identificacion->tipoDte, ['01', '03', '04', '05', '06']))
            @include('sections.documento_relacionado', [
                'documento_relacionado' => $dte->documentoRelacionado,
                'catalogs' => $catalogs,
            ])
        @endif
        {{-- Otros documentos asociados --}}
        @if (in_array($dte->identificacion->tipoDte, ['01', '03', '11', '15']))
            @include('sections.otros_documentos', [
                'otros_documentos' => $dte->otrosDocumentos,
                'tipoDte' => $dte->identificacion->tipoDte,
                'catalogs' => $catalogs,
            ])
        @endif
        {{-- Venta por cuenta de Terceros --}}
        @if (in_array($dte->identificacion->tipoDte, ['01', '03', '04', '05', '06', '11']))
            @include('sections.venta_tercero', ['venta_tercero' => $dte->ventaTercero])
        @endif
        {{-- Cuerpo del Documento --}}
        @if (in_array($dte->identificacion->tipoDte, ['01', '03']))
            @include('sections.cuerpo.feccf', [
                'cuerpoDocumento' => $dte->cuerpoDocumento,
                'catalogs' => $catalogs,
            ])
        @elseif(in_array($dte->identificacion->tipoDte, ['04', '05', '06']))
            @include('sections.cuerpo.ncndnr', [
                'cuerpoDocumento' => $dte->cuerpoDocumento,
                'catalogs' => $catalogs,
            ])
        @elseif($dte->identificacion->tipoDte == '07')
            @include('sections.cuerpo.cre', [
                'cuerpoDocumento' => $dte->cuerpoDocumento,
                'catalogs' => $catalogs,
            ])
        @elseif($dte->identificacion->tipoDte == '08')
            @include('sections.cuerpo.cle', [
                'cuerpoDocumento' => $dte->cuerpoDocumento,
                'catalogs' => $catalogs,
            ])
        @elseif($dte->identificacion->tipoDte == '09')
            @include('sections.cuerpo.dcle', [
                'documento' => $dte->cuerpoDocumento,
                'catalogs' => $catalogs,
            ])
        @elseif($dte->identificacion->tipoDte == '11')
            @include('sections.cuerpo.fexe', [
                'cuerpoDocumento' => $dte->cuerpoDocumento,
                'catalogs' => $catalogs,
            ])
        @elseif($dte->identificacion->tipoDte == '14')
            @include('sections.cuerpo.fsee', [
                'cuerpoDocumento' => $dte->cuerpoDocumento,
                'catalogs' => $catalogs,
            ])
        @endif

        {{-- Resumen --}}
        @include('sections.resumen', [
            'resumen' => $dte->resumen,
            'tipoDte' => $dte->identificacion->tipoDte,
            'catalogs' => $catalogs,
        ])

        {{-- Extension --}}
        @if (in_array($dte->identificacion->tipoDte, ['01', '03', '04', '05', '06', '07', '08', '09']))
            @include('sections.extension', [
                'extension' => $dte->extension,
                'tipoDte' => $dte->identificacion->tipoDte,
            ])
        @endif

        {{-- Apendice --}}
        @include('sections.apendice', ['apendice' => $dte->apendice])

    </body>
@endsection

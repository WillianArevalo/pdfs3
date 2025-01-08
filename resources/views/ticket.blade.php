@extends('layouts.app', ['title' => $dte->identificacion->codigoGeneracion])
@section('content')

    <body style="width: 54mm; margin:0px; padding:1mm; font-family: sans-serif;">

        <div style="text-align: center; font-size: 9pt; font-weight: 700;">
            {{ $dte->emisor->nombre }}
        </div>
        <div style="text-align:center; font-size: 6pt;">
            {{ $dte->emisor->direccion->complemento }}
        </div>
        <div style="text-align:center; font-size: 6pt; font-weight: 700;">
            Código de Generación
        </div>
        <div style="text-align:center; font-size: 6pt;"">
            {{ $dte->identificacion->codigoGeneracion }}
        </div>
        @if ($dte->identificacion->ambiente == '00')
            <div style="text-align:center; font-size: 6pt; color:#ef4444">
                ESTE DOCUMENTO ES DE PRUEBAS, NO TIENE VALIDEZ LEGAL
            </div>
        @endif
        <div style="font-size: 6pt;">
            <div style="font-weight: 700" style="font-weight: 700">Fecha:</div> {{ $dte->identificacion->fecEmi }}<br>
            <div style="font-weight: 700">Interno:</div> {{ $dte->identificacion->numeroControl }}<br>
            <div style="font-weight: 700">Cliente:</div> {{ $dte->receptor->nombre }}<br>
            <div>
                @if ($dte->identificacion->tipoDte == '01')
                    {{ $dte->receptor->numDocumento }}
                @else
                    {{ $dte->receptor->nit }}
                @endif
                <br>
                <div style="font-weight: 700">Correo:</div> {{ $dte->receptor->correo }} <br>
                <div style="font-weight: 700">Teléfono:</div> {{ $dte->receptor->telefono }}
            </div>

            <table style="margin-top: 10mm; width: 54mm; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border-bottom: 2px solid #000000; text-align: left">Código</th>
                        <th style="border-bottom: 2px solid #000000; text-align: left">Cantidad</th>
                        <th style="border-bottom: 2px solid #000000; text-align: left">Precio</th>
                        <th style="border-bottom: 2px solid #000000; text-align: left">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dte->cuerpoDocumento as $item)
                        <tr>
                            <td style="border-bottom: 1px solid #000000" style="border-bottom: 1px solid #000000">
                                {{ $item->codigo }}<br> {{ $item->descripcion }}</td>
                            <td style="border-bottom: 1px solid #000000">{{ $item->cantidad }}</td>
                            <td style="border-bottom: 1px solid #000000">{{ $item->precioUni }}</td>
                            <td style="border-bottom: 1px solid #000000">$
                                {{ $item->ventaGravada ?? ($item->ventaExenta ?? $item->ventaNoSuj) }}
                            </td>
                        </tr>
                    @endforeach
                    @if ($dte->resumen->tributos)
                        @foreach ($dte->resumen->tributos as $tributo)
                            <tr>
                                <td style="border-bottom: 1px solid #000000">{{ $tributo->codigo }}<br>
                                    {{ $tributo->descripcion }}
                                </td>
                                <td style="border-bottom: 1px solid #000000"></td>
                                <td style="border-bottom: 1px solid #000000"></td>
                                <td style="border-bottom: 1px solid #000000">${{ $tributo->valor }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <div style="margin-top: 10mm; text-align: right; font-weight: 700">
                Monto de Compra: ${{ $dte->resumen->totalPagar }}
            </div>

            <div style="text-align: center">
                <img style="margin-left:auto; margin-right: auto; margin-top: 10mm; margin-bottom: 10mm; width: 141pt; height: auto;"
                    src="{{ $qr_portal }}" alt="Código QR">
            </div>

            <div style="text-align: center; font-size:8pt">
                Descargue su factura desde el código QR,<br>
                además hemos enviado un correo<br>
                electrónico con los datos del documento<br>
                electrónico
            </div>

    </body>
@endsection

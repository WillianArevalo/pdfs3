@extends('layouts.app', ['title' => $dte->identificacion->codigoGeneracion])
@section('content')

    <body class="font-sans w-[54mm] m-0 p-[1mm]">

        <div class="text-center font-bold text-[9pt]">
            {{ $dte->emisor->nombre }}
        </div>
        <div class="text-center text-[6pt]">
            {{ $dte->emisor->direccion->complemento }}
        </div>
        <div class="text-center font-bold text-[6pt]">
            Código de Generación
        </div>
        <div class="text-center text-[6pt]">
            {{ $dte->identificacion->codigoGeneracion }}
        </div>
        @if ($dte->identificacion->ambiente == '00')
            <div class="text-center text-[6pt] text-red-500">
                ESTE DOCUMENTO ES DE PRUEBAS, NO TIENE VALIDEZ LEGAL
            </div>
        @endif
        <div class="text-[6pt]">
            <div class="font-bold">Fecha:</div> {{ $dte->identificacion->fecEmi }}<br>
            <div class="font-bold">Interno:</div> {{ $dte->identificacion->numeroControl }}<br>
            <div class="font-bold">Cliente:</div> {{ $dte->receptor->nombre }}<br>
            <div>
                @if ($dte->identificacion->tipoDte == '01')
                    {{ $dte->receptor->numDocumento }}
                @else
                    {{ $dte->receptor->nit }}
                @endif
                <br>
                <div class="font-bold">Correo:</div> {{ $dte->receptor->correo }} <br>
                <div class="font-bold">Teléfono:</div> {{ $dte->receptor->telefono }}
            </div>

            <table class="w-[54mm] border-collapse mt-[10mm]">
                <thead>
                    <tr>
                        <th class="text-left border-b-2 border-black">Código</th>
                        <th class="text-left border-b-2 border-black">Cantidad</th>
                        <th class="text-left border-b-2 border-black">Precio</th>
                        <th class="text-left border-b-2 border-black">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dte->cuerpoDocumento as $item)
                        <tr>
                            <td class="border-b border-black">{{ $item->codigo }}<br> {{ $item->descripcion }}</td>
                            <td class="border-b border-black">{{ $item->cantidad }}</td>
                            <td class="border-b border-black">{{ $item->precioUni }}</td>
                            <td class="border-b border-black">$
                                {{ $item->ventaGravada ?? ($item->ventaExenta ?? $item->ventaNoSuj) }}
                            </td>
                        </tr>
                    @endforeach
                    @if ($dte->resumen->tributos)
                        @foreach ($dte->resumen->tributos as $tributo)
                            <tr>
                                <td class="border-b border-black">{{ $tributo->codigo }}<br> {{ $tributo->descripcion }}
                                </td>
                                <td class="border-b border-black"></td>
                                <td class="border-b border-black"></td>
                                <td class="border-b border-black">${{ $tributo->valor }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <div class="text-right font-bold mt-[10mm]">
                Monto de Compra: ${{ $dte->resumen->totalPagar }}
            </div>

            <div class="text-center">
                <img class="w-[141pt] h-auto mx-auto my-[10mm]" src="{{ $qr_portal }}" alt="Código QR">
            </div>

            <div class="text-center text-[8pt]">
                Descargue su factura desde el código QR,<br>
                además hemos enviado un correo<br>
                electrónico con los datos del documento<br>
                electrónico
            </div>

    </body>
@endsection

<h1 class="text-center text-[9pt] uppercase font-bold">Documento Tributario Electrónico</h1>
<h2 class="text-center text-[9pt] font-bold">{{ $catalogs['CAT-002'][$identificacion->tipoDte] }}
    v{{ $identificacion->version }}</h2>
@if ($identificacion->ambiente == '00')
    <h2 class="text-center text-[9pt] font-bold text-red-500">ESTE DOCUMENTO ES DE PRUEBAS, NO TIENE VALIDEZ LEGAL</h2>
@endif

<table class="w-full mt-4">
    <tr>
        <td class="w-1/2">
            <img src="{{ $logo }}" alt="Logo" class="h-24">
        </td>
        <td class="w-1/4 text-center align-middle">
            <div class="inline-block text-center">
                <img src="{{ $qr_hacienda }}" alt="QR Code" class="w-36 h-36 mx-auto">
                <span>Consulta en Hacienda</span>
            </div>
        </td>
        <td class="w-1/4 text-center align-middle">
            <div class="inline-block text-center">
                <img src="{{ $qr_portal }}" alt="QR Code" class="w-36 h-36 mx-auto">
                <span>Descargue su DTE</span>
            </div>
        </td>
    </tr>
</table>

<div class="w-full mt-4 flex">
    <div class="w-1/2">
        <b>Código de Generación: </b>{{ $identificacion->codigoGeneracion }}<br>
        <b>Número de Control: </b>{{ $identificacion->numeroControl }}<br>
        <b>Sello de Recepción: </b>{{ $selloRecepcion }}<br>
    </div>
    <div class="w-1/2">
        <b>Modelo de Facturación:</b> {{ $catalogs['CAT-003'][$identificacion->tipoModelo] }}<br>
        <b>Tipo de Transmisión:</b>{{ $catalogs['CAT-004'][$identificacion->tipoOperacion] }}<br>
        <b>Fecha y Hora de Generación: </b>{{ $identificacion->fecEmi }} {{ $identificacion->horEmi }}<br>
        @if (in_array($identificacion->tipoDte, ['01', '03', '04', '05', '06', '07', '11', '14']) &&
                $identificacion->tipoOperacion == '2')
            <b>Tipo de Contingencia:</b> {{ $catalogs['CAT-005'][$identificacion->tipoContingencia] }}<br>
            <b>Motivo de Contingencia:</b> {{ $identificacion->motivoContin }}<br>
        @endif
    </div>
</div>

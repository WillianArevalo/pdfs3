<h1 style="text-align: center; font-size:9pt; text-transform: uppercase; font-weight: 700;">Documento Tributario
    Electrónico</h1>
<h2 style="text-align: center; font-size:9pt; font-weight: 700">
    {{ $catalogs['CAT-002'][$identificacion->tipoDte] }}
    v{{ $identificacion->version }}</h2>
@if ($identificacion->ambiente == '00')
    <h2 style="text-align:center; font-size:9pt; font-weight: 700; color:#ef4444">ESTE DOCUMENTO ES DE PRUEBAS, NO TIENE
        VALIDEZ LEGAL
    </h2>
@endif

<table style="margin-top:1rem; width: 100%">
    <tr>
        <td style="width: 50%">
            <img src="{{ $logo }}" alt="Logo" style="height: 6rem; width: auto">
        </td>
        <td style="width: 25%; vertical-align: middle; text-align: center;">
            <div style="display: inline-block; text-align: center;">
                <img src="{{ $qr_hacienda }}" alt="QR Code"
                    style="margin-left: auto; margin-right: auto; height: 9rem; width: 9rem">
                <span>Consulta en Hacienda</span>
            </div>
        </td>
        <td style="width: 25%; vertical-align: middle; text-align: center;">
            <div style="display: inline-block; text-align: center;">
                <img src="{{ $qr_portal }}" alt="QR Code"
                    style="margin-left: auto; margin-right: auto; height: 9rem; width: 9rem">
                <span>Descargue su DTE</span>
            </div>
        </td>
    </tr>
</table>

<div style="margin-top: 1rem; display: flex; width: 100%">
    <div style="width: 50%">
        <b>Código de Generación: </b>{{ $identificacion->codigoGeneracion }}<br>
        <b>Número de Control: </b>{{ $identificacion->numeroControl }}<br>
        <b>Sello de Recepción: </b>{{ $selloRecepcion }}<br>
    </div>
    <div style="width: 50%">
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

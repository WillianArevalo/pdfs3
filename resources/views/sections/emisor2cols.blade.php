<div class="w-full mt-5 flex">
    <div class="p-4 border-2 border-black rounded-lg w-1/2 me-2">
        <h1 class="text-center text-[9pt] font-bold mb-2">
            @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '14', '15']))
                Emisor
            @elseif($tipoDte == '08')
                Comisionista (Emisor)
            @elseif($tipoDte == '11')
                Exportador (Emisor)
            @endif
        </h1>
        <b>Nombre o razón social: </b>{{ $emisor->nombre }}<br>
        @if($tipoDte != "14")
        <b>Nombre Comercial: </b>{{ $emisor->nombreComercial }}<br>
        @endif
        <b>NIT: </b>{{ $emisor->nit }}<br>
        <b>NRC: </b>{{ $emisor->nrc }}<br>
        <b>Actividad Económica: </b>{{ $emisor->descActividad }}<br>
        <b>Dirección: </b>{{ $emisor->direccion->complemento }}<br>
        <b>Número de Teléfono: </b>{{ $emisor->telefono }}<br>
        <b>Correo Electrónico: </b>{{ $emisor->correo }}<br>
        @if($tipoDte != "14")
        <b>Tipo de Establecimiento: </b>{{ $catalogs['CAT-009'][$emisor->tipoEstablecimiento] }}<br>
        @endif
        @if($tipoDte == '11')
            <b>Recinto Fiscal: </b>{{ $catalogs["CAT-027"][$emisor->recintoFiscal] }}<br>
            <b>Régimen de Exportación: </b>{{ $catalogs['CAT-028'][$emisor->regimen] }}<br>
        @endif
    </div>
    <div class="p-4 border-2 border-black rounded-lg w-1/2 ms-2">
        <h1 class="text-center text-[9pt] font-bold mb-2">
            @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '11', '14', '15']))
                Receptor
            @elseif($tipoDte == '08')
                Mandante (Receptor)
            @endif
        </h1>
        <b>Nombre o razón social: </b>{{ $receptor->nombre }}<br>
        @if(in_array($tipoDte, ['01', '04', '11', '14', '15']))
            @if($receptor->tipoDocumento)
                <b>Tipo de Documento: </b>{{ $catalogs['CAT-022'][$receptor->tipoDocumento] }}<br>
            @endif
            @if(isset($receptor->numDocumento))
                <b>Número de Documento: </b>{{ $receptor->numDocumento }}<br>
            @endif
        @else
            <b>NIT: </b>{{ $receptor->nit }}<br>
        @endif
        @if(in_array($tipoDte, ['03', '04', '05', '06', '08']))
            <b>NRC: </b>{{ $receptor->nrc }}<br>
        @endif
        @if(in_array($tipoDte, ['01', '03', '04', '05', '06', '08', '11']))
            @if(isset($receptor->nombreComercial))
                <b>Nombre Comercial: </b>{{ $receptor->nombreComercial }}<br>
            @endif
        @endif
        @if(in_array($tipoDte, ['03', '04', '05', '06', '08', '11']))
            <b>Actividad Económica: </b>{{ $receptor->descActividad }}<br>
        @endif
        <b>Dirección: </b>{{ $emisor->direccion->complemento }}<br>
        @if($tipoDte == "11")
            <b>País de Destino: </b>{{ $receptor->nombrePais }}<br>
        @endif
        <b>Número de Teléfono: </b>{{ $emisor->telefono }}<br>
        <b>Correo Electrónico: </b>{{ $emisor->correo }}<br>
    </div>
</div>

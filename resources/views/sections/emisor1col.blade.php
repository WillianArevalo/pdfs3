{{-- Emisor --}}
<div class="w-full mt-5 p-4 border-2 border-black rounded-lg">
    <h1 class="text-center text-[9pt] font-bold mb-2">
        @if ($tipoDte == '07')
            Agente de Retención
        @elseif($tipoDte == '09')
            Agente Perceptor (Emisor)
        @endif
    </h1>
    <div class="flex">
        <div class="w-1/3">
            <b>Nombre o razón social: </b><br>{{ $emisor->nombre }}
        </div>
        <div class="w-1/3">
            <b>Nombre Comercial: </b><br>{{ $emisor->nombreComercial }}
        </div>
        <div class="w-1/3">
            <b>NIT: </b><br>{{ $emisor->nit }}
        </div>
    </div>
    <div class="flex">
        <div class="w-1/3">
            <b>NRC: </b><br>{{ $emisor->nrc }}
        </div>
        <div class="w-1/3">
            <b>Actividad Económica: </b><br>{{ $emisor->descActividad }}
        </div>
        <div class="w-1/3">
            <b>Dirección: </b><br>{{ $emisor->direccion->complemento }}
        </div>
    </div>
    <div class="flex">
        <div class="w-1/3">
            <b>Número de Teléfono: </b><br>{{ $emisor->telefono }}
        </div>
        <div class="w-1/3">
            <b>Correo Electrónico: </b><br>{{ $emisor->correo }}
        </div>
        <div class="w-1/3">
            <b>Tipo de Establecimiento: </b><br>{{ $catalogs['CAT-009'][$emisor->tipoEstablecimiento] }}
        </div>
    </div>
</div>
{{-- Receptor --}}
<div class="w-full mt-5 p-4 border-2 border-black rounded-lg">
    @if ($tipoDte == '07')
        <h1 class="text-center text-[9pt] font-bold mb-2">
            Sujeto de Retención (Receptor)
        </h1>
        <div class="flex">
            <div class="w-1/3">
                <b>Nombre o razón social: </b><br>{{ $receptor->nombre }}
            </div>
            <div class="w-1/3">
                <b>Tipo de Documento: </b><br>{{ $catalogs['CAT-022'][$receptor->tipoDocumento] }}
            </div>
            <div class="w-1/3">
                <b>NRC: </b><br>{{ $receptor->nrc }}
            </div>
        </div>
        <div class="flex">
            <div class="w-1/3">
                <b>Actividad Económica: </b><br>{{ $receptor->descActividad }}
            </div>
            <div class="w-1/3">
                <b>No. Documento: </b><br>{{ $receptor->numDocumento }}
            </div>
            <div class="w-1/3">
                <b>Nombre Comercial: </b><br>{{ $receptor->nombreComercial }}
            </div>
        </div>
        <div class="flex">
            <div class="w-1/3">
                <b>Dirección: </b><br>{{ $receptor->direccion->complemento }}
            </div>
            <div class="w-1/3">
                <b>Correo Electrónico: </b><br>{{ $receptor->correo }}
            </div>
        </div>
    @elseif($tipoDte == '09')
        <h1 class="text-center text-[9pt] font-bold mb-2">
            Afiliado (Receptor)
        </h1>
        <div class="flex">
            <div class="w-1/2">
                <b>Nombre o razón social: </b><br>{{ $receptor->nombre }}
            </div>
            <div class="w-1/2">
                <b>Actividad Económica: </b><br>{{ $receptor->descActividad }}
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2">
                <b>NIT: </b><br>{{ $receptor->nit }}
            </div>
            <div class="w-1/2">
                <b>Dirección: </b><br>{{ $receptor->direccion->complemento }}
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2">
                <b>NRC: </b><br>{{ $receptor->nrc }}
            </div>
            <div class="w-1/2">
                <b>Correo Electrónico: </b><br>{{ $receptor->correo }}
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2">
                <b>Tipo de Establecimiento: </b><br>{{ $catalogs['CAT-009'][$receptor->tipoEstablecimiento] }}
            </div>
            <div class="w-1/2">
                <b>Nombre Comercial: </b><br>{{ $receptor->nombreComercial }}
            </div>
        </div>
    @endif
</div>

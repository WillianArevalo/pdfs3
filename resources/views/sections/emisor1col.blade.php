{{-- Emisor --}}
<div style="width: 100%; margin-top:1.25rem; border: 2px solid #000; border-radius: 0.5rem; padding: 1rem;">
    <h1 style="margin-bottom: 0.5rem; font-size:9pt; font-weight: 700">
        @if ($tipoDte == '07')
            Agente de Retención
        @elseif($tipoDte == '09')
            Agente Perceptor (Emisor)
        @endif
    </h1>
    <div style="display: flex">
        <div style="width: 33.333333%">
            <b>Nombre o razón social: </b><br>{{ $emisor->nombre }}
        </div>
        <div style="width: 33.333333%">
            <b>Nombre Comercial: </b><br>{{ $emisor->nombreComercial }}
        </div>
        <div style="width: 33.333333%">
            <b>NIT: </b><br>{{ $emisor->nit }}
        </div>
    </div>
    <div style="display: flex">
        <div style="width: 33.333333%">
            <b>NRC: </b><br>{{ $emisor->nrc }}
        </div>
        <div style="width: 33.333333%">
            <b>Actividad Económica: </b><br>{{ $emisor->descActividad }}
        </div>
        <div style="width: 33.333333%">
            <b>Dirección: </b><br>{{ $emisor->direccion->complemento }}
        </div>
    </div>
    <div style="display: flex">
        <div style="width: 33.333333%">
            <b>Número de Teléfono: </b><br>{{ $emisor->telefono }}
        </div>
        <div style="width: 33.333333%">
            <b>Correo Electrónico: </b><br>{{ $emisor->correo }}
        </div>
        <div style="width: 33.333333%">
            <b>Tipo de Establecimiento: </b><br>{{ $catalogs['CAT-009'][$emisor->tipoEstablecimiento] }}
        </div>
    </div>
</div>
{{-- Receptor --}}
<div style="margin-top: 1.25rem; border: 2px solid #000; border-radius: 0.5rem; padding: 1rem;">
    @if ($tipoDte == '07')
        <h1 style="margin-bottom: 0.5rem; font-size:9pt; font-weight: 700">
            Sujeto de Retención (Receptor)
        </h1>
        <div style="display: flex">
            <div style="width: 33.333333%">
                <b>Nombre o razón social: </b><br>{{ $receptor->nombre }}
            </div>
            <div style="width: 33.333333%">
                <b>Tipo de Documento: </b><br>{{ $catalogs['CAT-022'][$receptor->tipoDocumento] }}
            </div>
            <div style="width: 33.333333%">
                <b>NRC: </b><br>{{ $receptor->nrc }}
            </div>
        </div>
        <div style="display: flex">
            <div style="width: 33.333333%">
                <b>Actividad Económica: </b><br>{{ $receptor->descActividad }}
            </div>
            <div style="width: 33.333333%">
                <b>No. Documento: </b><br>{{ $receptor->numDocumento }}
            </div>
            <div style="width: 33.333333%">
                <b>Nombre Comercial: </b><br>{{ $receptor->nombreComercial }}
            </div>
        </div>
        <div style="display: flex">
            <div style="width: 33.333333%">
                <b>Dirección: </b><br>{{ $receptor->direccion->complemento }}
            </div>
            <div style="width: 33.333333%">
                <b>Correo Electrónico: </b><br>{{ $receptor->correo }}
            </div>
        </div>
    @elseif($tipoDte == '09')
        <h1 style="margin-bottom: 0.5rem; font-size:9pt; font-weight: 700">
            Afiliado (Receptor)
        </h1>
        <div style="display: flex">
            <div style="width: 50%">
                <b>Nombre o razón social: </b><br>{{ $receptor->nombre }}
            </div>
            <div style="width: 50%">
                <b>Actividad Económica: </b><br>{{ $receptor->descActividad }}
            </div>
        </div>
        <div style="display: flex">
            <div style="width: 50%">
                <b>NIT: </b><br>{{ $receptor->nit }}
            </div>
            <div style="width: 50%">
                <b>Dirección: </b><br>{{ $receptor->direccion->complemento }}
            </div>
        </div>
        <div style="display: flex">
            <div style="width: 50%">
                <b>NRC: </b><br>{{ $receptor->nrc }}
            </div>
            <div style="width: 50%">
                <b>Correo Electrónico: </b><br>{{ $receptor->correo }}
            </div>
        </div>
        <div style="display: flex">
            <div style="width: 50%">
                <b>Tipo de Establecimiento: </b><br>{{ $catalogs['CAT-009'][$receptor->tipoEstablecimiento] }}
            </div>
            <div style="width: 50%">
                <b>Nombre Comercial: </b><br>{{ $receptor->nombreComercial }}
            </div>
        </div>
    @endif
</div>

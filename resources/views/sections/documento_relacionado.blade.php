@if ($documento_relacionado)
    <div style="width: 100%; margin-top: 1.25rem;">
        <h1 style="margin-bottom:0.5rem; text-align:center; font-size:9pt; font-weight: 700">Documentos Relacionados</h1>
        <div style="width:100%; border-radius:0.5rem; border: 2px solid #000000; padding: 1rem;">
            <div style="display: flex">
                <div style="width: 20%">
                    <b>Tipo de Documento</b>
                </div>
                <div style="width: 20%">
                    <b>Tipo de Generación</b>
                </div>
                <div style="width: 40%">
                    <b>No. de Documento</b>
                </div>
                <div style="width: 20%">
                    <b>Fecha del Documento</b>
                </div>
            </div>
            @foreach ($documento_relacionado as $dr)
                <div style="display: flex;">
                    <div style="width: 20%">{{ $catalogs['CAT-002'][$dr->tipoDocumento] }}</div>
                    <div style="width: 20%">{{ $catalogs['CAT-007'][$dr->tipoGeneracion] }}</div>
                    <div style="width: 40%">{{ $dr->numeroDocumento }}</div>
                    <div style="width: 20%">{{ $dr->fechaEmision }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endif

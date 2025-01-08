@if($documento_relacionado)
<div class="w-full mt-5">
    <h1 class="text-center text-[9pt] font-bold mb-2">Documentos Relacionados</h1>
    <div class="w-full p-4 border-2 border-black rounded-lg">
        <div class="flex">
            <div class="w-1/5">
                <b>Tipo de Documento</b>
            </div>
            <div class="w-1/5">
                <b>Tipo de Generación</b>
            </div>
            <div class="w-2/5">
                <b>No. de Documento</b>
            </div>
            <div class="w-1/5">
                <b>Fecha del Documento</b>
            </div>
        </div>
            @foreach ($documento_relacionado as $dr)
            <div class="flex">
                <div class="w-1/5">{{$catalogs["CAT-002"][$dr->tipoDocumento]}}</div>
                <div class="w-1/5">{{$catalogs["CAT-007"][$dr->tipoGeneracion]}}</div>
                <div class="w-2/5">{{$dr->numeroDocumento}}</div>
                <div class="w-1/5">{{$dr->fechaEmision}}</div>
            </div>
            @endforeach
    </div>
</div>
@endif
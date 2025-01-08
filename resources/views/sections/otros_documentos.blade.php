@if($otros_documentos)
<div class="w-full mt-5">
    <h1 class="text-center text-[9pt] font-bold mb-2">Otros Documentos Asociados</h1>
    <div class="w-full p-4 border-2 border-black rounded-lg">
        <table class="w-full text-left">
            <thead class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="py-2 w-2/5">Tipo de Documento</th>
                    <th class="py-2 w-3/5">Detalle</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($otros_documentos as $od)
                    <tr>
                        <td class="py-2">{{$catalogs["CAT-021"][$od->codDocAsociado]}}</td>
                        <td class="py-2">
                            @if($od->detalleDocumento)
                            <b>Descripcion: </b>{{$od->detalleDocumento}}<br>
                            @endif
                            @if(in_array($tipoDte, ["01", "03"]))
                                @if($od->medico)
                                <b>Medico: </b>{{$od->medico->nombre}}<br>
                                <b>Identificacion: </b>{{$od->medico->nit ?? $od->medico->docIdentificacion}}<br>
                                <b>Servicio Realizado: </b>{{$catalogs["CAT-010"][$od->medico->tipoServicio]}}<br>
                                @endif
                            @elseif($tipoDte == "11")
                                @if($od->modoTransp)
                                <b>Modo de Tranporte: </b>{{$catalogs["CAT-030"][$od->modoTransp]}}<br>
                                @endif
                                @if($od->placaTrans)
                                <b>Placa: </b>{{$od->placaTrans}}<br>
                                @endif
                                @if($od->numConductor)
                                <b>Identificación del Conductor: </b>{{$od->numConductor}}<br>
                                @endif
                                @if($od->nombreConductor)
                                <b>Nombre: </b>{{$od->nombreConductor}}<br>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
@endif
@if ($otros_documentos)
    <div style="width: 100%; margin-top: 1.25rem;">
        <h1 style="margin-bottom:0.5rem; text-align:center; font-size:9pt; font-weight: 700">Otros Documentos Asociados
        </h1>
        <div style="width: 100%; border-radius:0.5rem; border:2px solid #000000; padding:1rem;">
            <table style="width: 100%; text-align:left; ">
                <thead style="background-color: #f9fafb; color:#374151;">
                    <tr>
                        <th style="width: 40%; padding-top: 0.5rem; padding-bottom: 0.5rem;">
                            Tipo de Documento
                        </th>
                        <th style="width: 60%; padding-top: 0.5rem; padding-bottom: 0.5rem;">
                            Detalle
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($otros_documentos as $od)
                        <tr>
                            <td style="padding-top: 0.5rem; padding-bottom: 0.5rem;">
                                {{ $catalogs['CAT-021'][$od->codDocAsociado] }}</td>
                            <td style="padding-top: 0.5rem; padding-bottom: 0.5rem;">
                                @if ($od->detalleDocumento)
                                    <b>Descripcion: </b>{{ $od->detalleDocumento }}<br>
                                @endif
                                @if (in_array($tipoDte, ['01', '03']))
                                    @if ($od->medico)
                                        <b>Medico: </b>{{ $od->medico->nombre }}<br>
                                        <b>Identificacion:
                                        </b>{{ $od->medico->nit ?? $od->medico->docIdentificacion }}<br>
                                        <b>Servicio Realizado:
                                        </b>{{ $catalogs['CAT-010'][$od->medico->tipoServicio] }}<br>
                                    @endif
                                @elseif($tipoDte == '11')
                                    @if ($od->modoTransp)
                                        <b>Modo de Tranporte: </b>{{ $catalogs['CAT-030'][$od->modoTransp] }}<br>
                                    @endif
                                    @if ($od->placaTrans)
                                        <b>Placa: </b>{{ $od->placaTrans }}<br>
                                    @endif
                                    @if ($od->numConductor)
                                        <b>Identificación del Conductor: </b>{{ $od->numConductor }}<br>
                                    @endif
                                    @if ($od->nombreConductor)
                                        <b>Nombre: </b>{{ $od->nombreConductor }}<br>
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

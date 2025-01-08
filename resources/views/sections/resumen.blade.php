<div style="display: flex; width: 100%; margin-top: 1.25rem;">
    <div style="width: 60%">
        @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '08', '11', '14', '15']))
            <b>Valor en Letras: </b>{{ $resumen->totalLetras }}<br>
        @elseif($tipoDte == '07')
            <b>Valor en Letras IVA Retenido: </b>{{ $resumen->totalIVAretenidoLetras }}<br>
        @endif
        @if (in_array($tipoDte, ['01', '03', '05', '06', '08', '11', '14']))
            <b>Condición de la Operación: </b>{{ $catalogs['CAT-016'][$resumen->condicionOperacion] }}<br>
        @endif
        @if ($tipoDte == '11')
            <b>INCOTERMS: </b>{{ $catalogs['CAT-031'][$resumen->codIncoterms] }}<br>
            @if ($resumen->observaciones)
                <b>Observaciones: </b>{{ $resumen->observaciones }}<br>
            @endif
        @endif
    </div>
    <div style="width: 40%">
        <table style="margin-top: 1.25rem; width:100%; border-collapse: collapse; border:1px solid #64748b;">
            <thead style="background-color: #f1f5f9;">
                <tr>
                    <th style="border:1px solid #475569; text-align:center;" colspan="2">Resumen</th>
                </tr>
            </thead>
            <tbody>
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '08', '11']))
                    <tr>
                        <td style="border:1px solid #475569;">Total Ventas Gravadas</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->totalGravada) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '08']))
                    <tr>
                        <td style="border:1px solid #475569;">Total Ventas Exentas</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->totalExenta) }}</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #475569;">Total Ventas No Sujetas</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->totalNoSuj) }}
                        </td>
                    </tr>
                @endif
                @if ($tipoDte == '08')
                    <tr>
                        <td style="border:1px solid #475569;">Total Exportaciones</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->exportacion) }}
                        </td>
                    </tr>
                @endif
                @if ($tipoDte == '14')
                    <tr>
                        <td style="border:1px solid #475569;">Total Compras</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->totalCompra) }}
                        </td>
                    </tr>
                @endif
                @if ($tipoDte == '15')
                    <tr>
                        <td style="border:1px solid #475569;">Valor Total de la Donación</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->valorTotal) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '08']))
                    <tr>
                        <td style="border:1px solid #475569;">Suma de Operaciones sin Impuestos</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->subTotalVentas) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06']))
                    <tr>
                        <td style="border:1px solid #475569;">Descuento a Ventas No Sujetas</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->descuNoSuj) }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #475569;">Descuento a Ventas Exentas</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->descuExenta) }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #475569;">Descuento a Ventas Gravadas</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->descuGravada) }}
                        </td>
                    </tr>
                @endif
                @if ($tipoDte == '11')
                    <tr>
                        <td style="border:1px solid #475569;">Descuento</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->descuento) }}
                        </td>
                    </tr>
                @endif
                @if ($tipoDte == '14')
                    <tr>
                        <td style="border:1px solid #475569;">Descuento</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->descu) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '11', '14']))
                    <tr>
                        <td style="border:1px solid #475569;">Total de Descuento</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->totalDescu) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '08']))
                    @if ($resumen->tributos)
                        @foreach ($resumen->tributos as $tributo)
                            <tr>
                                <td style="border:1px solid #475569;">{{ $tributo->descripcion }}</td>
                                <td style="border:1px solid #475569; text-align: right">
                                    ${{ formatNumber($tributo->valor) }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '14']))
                    <tr>
                        <td style="border:1px solid #475569;">Sub-Total</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->subTotal) }}
                        </td>
                    </tr>
                @endif
                @if ($tipoDte == '07')
                    <tr>
                        <td style="border:1px solid #475569;">Total Monto Sujeto a Retención</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->totalSujetoRetencion) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['03', '05', '06']))
                    <tr>
                        <td style="border:1px solid #475569;">IVA Percibido (1%)</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->ivaPerci1) }}
                        </td>
                    </tr>
                @endif
                @if ($tipoDte == '08')
                    <tr>
                        <td style="border:1px solid #475569;">IVA Percibido Liquidado</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->ivaPerci) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '05', '06', '14']))
                    <tr>
                        <td style="border:1px solid #475569;">IVA Retenido (1%)</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->ivaRete1) }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #475569;">Retención Renta</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->reteRenta) }}
                        </td>
                    </tr>
                @endif
                @if ($tipoDte == '11')
                    <tr>
                        <td style="border:1px solid #475569;">Seguro</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->seguro) }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #475569;">Flete</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->flete) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '08', '11']))
                    <tr>
                        <td style="border:1px solid #475569;">Monto Total de la Operación</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->montoTotalOperacion) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '11']))
                    <tr>
                        <td style="border:1px solid #475569;">Total Cargos/Abonos que no afectan la base imponible</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->totalNoGravado) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '11', '14']))
                    <tr>
                        <td style="border:1px solid #475569;">Total a Pagar</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->totalPagar) }}
                        </td>
                    </tr>
                @endif
                @if ($tipoDte == '08')
                    <tr>
                        <td style="border:1px solid #475569;">Total</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->total) }}
                        </td>
                    </tr>
                @endif
                @if ($tipoDte == '07')
                    <tr>
                        <td style="border:1px solid #475569;">Total IVA Retenido</td>
                        <td style="border:1px solid #475569; text-align: right">
                            ${{ formatNumber($resumen->totalIVAretenido) }}
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

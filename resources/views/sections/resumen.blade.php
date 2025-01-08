<div class="flex w-full mt-5">
    <div class="w-3/5">
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
    <div class="w-2/5">
        <table class="w-full mt-5 border-collapse border border-slate-500">
            <thead class="bg-slate-100">
                <tr>
                    <th class="border border-slate-600 text-center" colspan="2">Resumen</th>
                </tr>
            </thead>
            <tbody>
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '08', '11']))
                    <tr>
                        <td class="border border-slate-600">Total Ventas Gravadas</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->totalGravada) }}</td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '08']))
                    <tr>
                        <td class="border border-slate-600">Total Ventas Exentas</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->totalExenta) }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-600">Total Ventas No Sujetas</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->totalNoSuj) }}</td>
                    </tr>
                @endif
                @if ($tipoDte == '08')
                    <tr>
                        <td class="border border-slate-600">Total Exportaciones</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->exportacion) }}</td>
                    </tr>
                @endif
                @if ($tipoDte == '14')
                    <tr>
                        <td class="border border-slate-600">Total Compras</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->totalCompra) }}</td>
                    </tr>
                @endif
                @if ($tipoDte == '15')
                    <tr>
                        <td class="border border-slate-600">Valor Total de la Donación</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->valorTotal) }}</td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '08']))
                    <tr>
                        <td class="border border-slate-600">Suma de Operaciones sin Impuestos</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->subTotalVentas) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06']))
                    <tr>
                        <td class="border border-slate-600">Descuento a Ventas No Sujetas</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->descuNoSuj) }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-600">Descuento a Ventas Exentas</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->descuExenta) }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-600">Descuento a Ventas Gravadas</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->descuGravada) }}</td>
                    </tr>
                @endif
                @if ($tipoDte == '11')
                    <tr>
                        <td class="border border-slate-600">Descuento</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->descuento) }}</td>
                    </tr>
                @endif
                @if ($tipoDte == '14')
                    <tr>
                        <td class="border border-slate-600">Descuento</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->descu) }}</td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '11', '14']))
                    <tr>
                        <td class="border border-slate-600">Total de Descuento</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->totalDescu) }}</td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '08']))
                    @if ($resumen->tributos)
                        @foreach ($resumen->tributos as $tributo)
                            <tr>
                                <td class="border border-slate-600">{{ $tributo->descripcion }}</td>
                                <td class="border border-slate-600 text-right">${{ formatNumber($tributo->valor) }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '14']))
                    <tr>
                        <td class="border border-slate-600">Sub-Total</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->subTotal) }}</td>
                    </tr>
                @endif
                @if ($tipoDte == '07')
                    <tr>
                        <td class="border border-slate-600">Total Monto Sujeto a Retención</td>
                        <td class="border border-slate-600 text-right">
                            ${{ formatNumber($resumen->totalSujetoRetencion) }}</td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['03', '05', '06']))
                    <tr>
                        <td class="border border-slate-600">IVA Percibido (1%)</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->ivaPerci1) }}</td>
                    </tr>
                @endif
                @if ($tipoDte == '08')
                    <tr>
                        <td class="border border-slate-600">IVA Percibido Liquidado</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->ivaPerci) }}</td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '05', '06', '14']))
                    <tr>
                        <td class="border border-slate-600">IVA Retenido (1%)</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->ivaRete1) }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-600">Retención Renta</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->reteRenta) }}</td>
                    </tr>
                @endif
                @if ($tipoDte == '11')
                    <tr>
                        <td class="border border-slate-600">Seguro</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->seguro) }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-600">Flete</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->flete) }}</td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '04', '05', '06', '08', '11']))
                    <tr>
                        <td class="border border-slate-600">Monto Total de la Operación</td>
                        <td class="border border-slate-600 text-right">
                            ${{ formatNumber($resumen->montoTotalOperacion) }}</td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '11']))
                    <tr>
                        <td class="border border-slate-600">Total Cargos/Abonos que no afectan la base imponible</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->totalNoGravado) }}
                        </td>
                    </tr>
                @endif
                @if (in_array($tipoDte, ['01', '03', '11', '14']))
                    <tr>
                        <td class="border border-slate-600">Total a Pagar</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->totalPagar) }}</td>
                    </tr>
                @endif
                @if ($tipoDte == '08')
                    <tr>
                        <td class="border border-slate-600">Total</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->total) }}</td>
                    </tr>
                @endif
                @if ($tipoDte == '07')
                    <tr>
                        <td class="border border-slate-600">Total IVA Retenido</td>
                        <td class="border border-slate-600 text-right">${{ formatNumber($resumen->totalIVAretenido) }}
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

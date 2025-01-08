<table class="w-full mt-5 border-collapse border border-slate-500">
    <thead class="bg-slate-100">
        <tr>
            <th class="border border-slate-600">No.</th>
            <th class="border border-slate-600">Cantidad</th>
            <th class="border border-slate-600">Unidad</th>
            <th class="border border-slate-600">Código</th>
            <th class="border border-slate-600">Descripción</th>
            <th class="border border-slate-600">Precio<br>unitario</th>
            <th class="border border-slate-600">Descuento por<br>ítem</th>
            <th class="border border-slate-600">Ventas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuerpoDocumento as $item)
            <tr>
                <td class="border border-slate-600 text-center">{{ $item->numItem }}</td>
                <td class="border border-slate-600 text-right">{{ formatNumber($item->cantidad) }}</td>
                <td class="border border-slate-600 text-center">{{ $catalogs['CAT-014'][$item->uniMedida] }}</td>
                <td class="border border-slate-600 text-center">{{ $item->codigo }}</td>
                <td class="border border-slate-600">{{ $item->descripcion }}</td>
                <td class="border border-slate-600 text-right">${{ formatNumber($item->precioUni) }}</td>
                <td class="border border-slate-600 text-right">
                    @if ($item->montoDescu != 0)
                        ${{ formatNumber($item->montoDescu) }}
                    @endif
                </td>
                <td class="border border-slate-600 text-right">
                    @if ($item->compra != 0)
                        ${{ formatNumber($item->compra) }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

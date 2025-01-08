<table class="w-full mt-5 border-collapse border border-slate-500">
    <thead class="bg-slate-100">
        <tr>
            <th class="border border-slate-600">No.</th>
            <th class="border border-slate-600">Tipo de Doc. Relacionado</th>
            <th class="border border-slate-600">No. de Doc. Relacionado</th>
            <th class="border border-slate-600">Fecha del Doc.</th>
            <th class="border border-slate-600">Observación por ítem</th>
            <th class="border border-slate-600">Exportaciones</th>
            <th class="border border-slate-600">Ventas<br>No Sujetas</th>
            <th class="border border-slate-600">Ventas<br>Exentas</th>
            <th class="border border-slate-600">Ventas<br>Gravadas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuerpoDocumento as $item)
            <tr>
                <td class="border border-slate-600 text-center">{{ $item->numItem }}</td>
                <td class="border border-slate-600 text-right">{{ $catalogs["CAT-002"][$item->tipoDte] }}</td>
                <td class="border border-slate-600 text-center">{{ $item->numeroDocumento }}</td>
                <td class="border border-slate-600 text-center">{{ $item->fechaEmision }}</td>
                <td class="border border-slate-600">{{ $item->obsItem }}</td>
                <td class="border border-slate-600 text-right">
                    @if ($item->exportaciones != 0)
                        ${{ formatNumber($item->exportaciones) }}
                    @endif
                </td>
                <td class="border border-slate-600 text-right">
                    @if ($item->ventaNoSuj != 0)
                        ${{ formatNumber($item->ventaNoSuj) }}
                    @endif
                </td>
                <td class="border border-slate-600 text-right">
                    @if ($item->ventaExenta != 0)
                        ${{ formatNumber($item->ventaExenta) }}
                    @endif
                </td>
                <td class="border border-slate-600 text-right">
                    @if ($item->ventaGravada != 0)
                        ${{ formatNumber($item->ventaGravada) }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<table class="w-full mt-5 border-collapse border border-slate-500">
    <thead class="bg-slate-100">
        <tr>
            <th class="border border-slate-600">No.</th>
            <th class="border border-slate-600">Tipo de Doc. Relacionado</th>
            <th class="border border-slate-600">No. de Doc. Relacionado</th>
            <th class="border border-slate-600">Fecha del Doc.</th>
            <th class="border border-slate-600">Descripción</th>
            <th class="border border-slate-600">Monto Sujeto<br>a Retención</th>
            <th class="border border-slate-600">IVA Retenido</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuerpoDocumento as $item)
            <tr>
                <td class="border border-slate-600 text-center">{{ $item->numItem }}</td>
                <td class="border border-slate-600 text-right">{{ $catalogs["CAT-002"][$item->tipoDte] }}</td>
                <td class="border border-slate-600 text-center">{{ $item->numeroDocumento }}</td>
                <td class="border border-slate-600 text-center">{{ $item->fechaEmision }}</td>
                <td class="border border-slate-600">{{ $item->descripcion }}</td>
                <td class="border border-slate-600 text-right">${{ formatNumber($item->montoSujetoGrav) }}</td>
                <td class="border border-slate-600 text-right">${{ formatNumber($item->ivaRetenido) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

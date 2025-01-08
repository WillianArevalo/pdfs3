<table style="width: 100%; margin-top:1.25rem; border-collapse: collapse; border: 1px solid #64748b;">
    <thead style="background-color: #f1f5f9">
        <tr>
            <th style="border:1px solid #475569">No.</th>
            <th style="border:1px solid #475569">Tipo de Doc. Relacionado</th>
            <th style="border:1px solid #475569">No. de Doc. Relacionado</th>
            <th style="border:1px solid #475569">Fecha del Doc.</th>
            <th style="border:1px solid #475569">Descripción</th>
            <th style="border:1px solid #475569">Monto Sujeto<br>a Retención</th>
            <th style="border:1px solid #475569">IVA Retenido</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuerpoDocumento as $item)
            <tr>
                <td style="border:1px solid #475569; text-align: center">{{ $item->numItem }}</td>
                <td style="border:1px solid #475569; text-align: right">{{ $catalogs['CAT-002'][$item->tipoDte] }}</td>
                <td style="border:1px solid #475569; text-align: center">{{ $item->numeroDocumento }}</td>
                <td style="border:1px solid #475569; text-align: center">{{ $item->fechaEmision }}</td>
                <td style="border:1px solid #475569">{{ $item->descripcion }}</td>
                <td style="border:1px solid #475569; text-align: right">${{ formatNumber($item->montoSujetoGrav) }}</td>
                <td style="border:1px solid #475569; text-align: right">${{ formatNumber($item->ivaRetenido) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

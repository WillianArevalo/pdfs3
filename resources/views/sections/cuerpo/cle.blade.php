<table style="width: 100%; margin-top:1.25rem; border-collapse: collapse; border: 1px solid #64748b;">
    <thead style="background-color: #f1f5f9">
        <tr>
            <th style="border:1px solid #475569">No.</th>
            <th style="border:1px solid #475569">Tipo de Doc. Relacionado</th>
            <th style="border:1px solid #475569">No. de Doc. Relacionado</th>
            <th style="border:1px solid #475569">Fecha del Doc.</th>
            <th style="border:1px solid #475569">Observación por ítem</th>
            <th style="border:1px solid #475569">Exportaciones</th>
            <th style="border:1px solid #475569">Ventas<br>No Sujetas</th>
            <th style="border:1px solid #475569">Ventas<br>Exentas</th>
            <th style="border:1px solid #475569">Ventas<br>Gravadas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuerpoDocumento as $item)
            <tr>
                <td style="border:1px solid #475569; text-align: center">{{ $item->numItem }}</td>
                <td style="border:1px solid #475569; text-align: right">{{ $catalogs['CAT-002'][$item->tipoDte] }}</td>
                <td style="border:1px solid #475569; text-align: center">{{ $item->numeroDocumento }}</td>
                <td style="border:1px solid #475569; text-align: center">{{ $item->fechaEmision }}</td>
                <td style="border:1px solid #475569">{{ $item->obsItem }}</td>
                <td style="border:1px solid #475569; text-align: right">
                    @if ($item->exportaciones != 0)
                        ${{ formatNumber($item->exportaciones) }}
                    @endif
                </td>
                <td style="border:1px solid #475569; text-align: right">
                    @if ($item->ventaNoSuj != 0)
                        ${{ formatNumber($item->ventaNoSuj) }}
                    @endif
                </td>
                <td style="border:1px solid #475569; text-align: right">
                    @if ($item->ventaExenta != 0)
                        ${{ formatNumber($item->ventaExenta) }}
                    @endif
                </td>
                <td style="border:1px solid #475569; text-align: right">
                    @if ($item->ventaGravada != 0)
                        ${{ formatNumber($item->ventaGravada) }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

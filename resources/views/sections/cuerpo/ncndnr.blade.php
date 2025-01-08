<table style="width: 100%; margin-top:1.25rem; border-collapse: collapse; border: 1px solid #64748b;">
    <thead style="background-color: #f1f5f9">
        <tr>
            <th style="border:1px solid #475569">No.</th>
            <th style="border:1px solid #475569">Cantidad</th>
            <th style="border:1px solid #475569">Unidad</th>
            <th style="border:1px solid #475569">Código</th>
            <th style="border:1px solid #475569">Descripción</th>
            <th style="border:1px solid #475569">Precio<br>unitario</th>
            <th style="border:1px solid #475569">Descuento por<br>ítem</th>
            <th style="border:1px solid #475569">Ventas<br>No Sujetas</th>
            <th style="border:1px solid #475569">Ventas<br>Exentas</th>
            <th style="border:1px solid #475569">Ventas<br>Gravadas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuerpoDocumento as $item)
            <tr>
                <td style="border:1px solid #475569; text-align: center">{{ $item->numItem }}</td>
                <td style="border:1px solid #475569; text-align: right">{{ formatNumber($item->cantidad) }}</td>
                <td style="border:1px solid #475569; text-align: center">{{ $catalogs['CAT-014'][$item->uniMedida] }}
                </td>
                <td style="border:1px solid #475569; text-align: center">{{ $item->codigo }}</td>
                <td style="border:1px solid #475569">{{ $item->descripcion }}</td>
                <td style="border:1px solid #475569; text-align: right">${{ formatNumber($item->precioUni) }}
                </td>
                <td style="border:1px solid #475569; text-align: right">
                    @if ($item->montoDescu != 0)
                        ${{ formatNumber($item->montoDescu) }}
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

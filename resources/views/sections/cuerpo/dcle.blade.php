<div style="margin-top: 1.25rem; width:100%; border-radius:0.5rem; border:2px solid #000; padding:1rem">
    <div style="width: 50%">
        <b>Fecha de Inicio del período de Liquidación: </b>{{ $documento->periodoLiquidacionFechaInicio }}<br>
        <b>Valor de las Operaciones a Liquidar: </b>${{ formatNumber($documento->valorOperaciones) }}<br>
        <b>Descripción del monto no sujeto a percepción: </b>{{ $documento->descripSinPercepcion }}<br>
        <b>Valores no sujetos a percepción: </b>${{ formatNumber($documento->montoSinPercepcion) }}<br>
        <b>Subtotal: </b>${{ formatNumber($documento->subTotal) }}<br>
        <b>IVA de las operaciones a liquidar: </b>${{ formatNumber($documento->iva) }}<br>
        <b>Montos sujetos a percepción sin IVA: </b>${{ formatNumber($documento->montoSujetoPercepcion) }}<br>
        <b>IVA Percibido (2%): </b>${{ formatNumber($documento->ivaPercibido) }}<br>
    </div>
    <div style="width: 50%">
        <b>Fecha de Término del período de Liquidación: </b>{{ $documento->periodoLiquidacionFechaFin }}<br>
        <b>Cantidad de documentos de Liquidación: </b>{{ $documento->cantidadDoc }}<br>
        <b>Comisión: </b>${{ formatNumber($documento->comision) }}<br>
        <b>Porcentaje de comisión: </b>{{ $documento->porcentComision }}<br>
        <b>IVA de la comisión: </b>${{ formatNumber($documento->ivaComision) }}<br>
        <b>Valor líquido a pagar al Afiliado: </b>${{ formatNumber($documento->liquidoApagar) }}<br>
        <b>Valor en Letras: </b>{{ $documento->totalLetras }}<br>
        <b>Observaciones: </b>{{ $documento->observaciones }}<br>
    </div>
</div>

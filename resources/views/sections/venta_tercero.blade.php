@if ($venta_tercero)
    <div style="width: 100%; margin-top:1.25rem; ">
        <h1 style="margin-bottom: 0.5rem; text-align:center; font-size:9pt; font-weight: 700">Venta por Cuenta de
            Terceros
        </h1>
        <div style="width: 100%; border-radius:0.5rem; border:2px solid #000; padding:1rem;">
            <div style="display: flex;">
                <div style="width: 50%;">
                    <b>NIT</b>
                </div>
                <div style="width: 50%;">
                    <b>Nombre, denominación o Razón Social</b>
                </div>
            </div>
            <div style="display:flex;">
                <div style="width: 50%;">{{ $venta_tercero->nit }}</div>
                <div style="width: 50%;">{{ $venta_tercero->nombre }}</div>
            </div>
        </div>
    </div>
@endif

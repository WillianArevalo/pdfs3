@if ($apendice)
    <div style="width: 100%; margin-top: 1.25rem;">
        <h1 style="margin-bottom:0.5rem; text-align:center; font-size:9pt; font-weight: 700">Apéndice</h1>
        <div style="width:100%; border-radius:0.5rem; border: 2px solid #000000; padding: 1rem;">
            <div style="display: flex">
                <div style="width: 33.333333%">
                    <b>Campo</b>
                </div>
                <div style="width: 33.333333%">
                    <b>Descripción</b>
                </div>
                <div style="width: 33.333333%">
                    <b>Valor</b>
                </div>
            </div>
            @foreach ($apendice as $ap)
                <div style="display: flex">
                    <div style="width: 33.333333%">{{ $ap->campo }}</div>
                    <div style="width: 33.333333%">{{ $ap->etiqueta }}</div>
                    <div style="width: 33.333333%">{{ $ap->valor }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endif

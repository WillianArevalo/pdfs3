@if($apendice)
<div class="w-full mt-5">
    <h1 class="text-center text-[9pt] font-bold mb-2">Apéndice</h1>
    <div class="w-full p-4 border-2 border-black rounded-lg">
        <div class="flex">
            <div class="w-1/3">
                <b>Campo</b>
            </div>
            <div class="w-1/3">
                <b>Descripción</b>
            </div>
            <div class="w-1/3">
                <b>Valor</b>
            </div>
        </div>
        @foreach ($apendice as $ap)
        <div class="flex">
            <div class="w-1/3">{{$ap->campo}}</div>
            <div class="w-1/3">{{$ap->etiqueta}}</div>
            <div class="w-1/3">{{$ap->valor}}</div>
        </div>
        @endforeach
    </div>
</div>
@endif
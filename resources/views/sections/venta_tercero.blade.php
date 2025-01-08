@if($venta_tercero)
<div class="w-full mt-5">
    <h1 class="text-center text-[9pt] font-bold mb-2">Venta por Cuenta de Terceros</h1>
    <div class="w-full p-4 border-2 border-black rounded-lg">
        <div class="flex">
            <div class="w-1/2">
                <b>NIT</b>
            </div>
            <div class="w-1/2">
                <b>Nombre, denominación o Razón Social</b>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/2">{{$venta_tercero->nit}}</div>
            <div class="w-1/2">{{$venta_tercero->nombre}}</div>
        </div>
    </div>
</div>
@endif
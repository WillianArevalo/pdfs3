@if($extension)
<div class="w-full mt-5">
    <h1 class="text-center text-[9pt] font-bold mb-2">Extensión</h1>
    <div class="w-full p-4 border-2 border-black rounded-lg">
        @if($tipoDte != "14")
        <div class="flex">
            <div class="w-1/2">
                <b>Responsable por parte del Emisor: </b>{{$extension->nombEntrega}}
            </div>
            <div class="w-1/2">
                <b>No. de Documento: </b>{{$extension->docuEntrega}}
            </div>
        </div>
        @endif
        @if($tipoDte == "09")
        <div class="flex">
            <div class="w-full">
                <b>Código de Empleado: </b>{{$extension->codEmpleado}}
            </div>
        </div>
        @endif
        @if($tipoDte != "09" && $tipoDte != "14")
        <div class="flex">
            <div class="w-1/2">
                <b>Responsable por parte del Receptor: </b>{{$extension->nombRecibe}}
            </div>
            <div class="w-1/2">
                <b>No. de Documento: </b>{{$extension->docuRecibe}}
            </div>
        </div>
        @endif
        @if($tipoDte == "01" || $tipoDte == "03")
        <div class="flex">
            <div class="w-full">
                <b>Placa del Vehículo: </b>{{$extension->placaVehiculo}}
            </div>
        </div>
        @endif
        @if($tipoDte != "09")
        <div class="flex">
            <div class="w-full">
                <b>Observaciones: </b>{{$extension->observaciones}}
            </div>
        </div>
        @endif
    </div>
</div>
@endif
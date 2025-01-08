@if ($extension)
    <div style="width: 100%; margin-top:1.25rem">
        <h1 style="margin-bottom: 0.5rem; text-align: center; font-size:9pt; font-weight: 700">Extensión</h1>
        <div style="width: 100%; border-radius: 0.5rem; border: 2px solid #000; padding: 1rem;">
            @if ($tipoDte != '14')
                <div style="display: flex">
                    <div style="width: 50%">
                        <b>Responsable por parte del Emisor: </b>{{ $extension->nombEntrega }}
                    </div>
                    <div style="width: 50%">
                        <b>No. de Documento: </b>{{ $extension->docuEntrega }}
                    </div>
                </div>
            @endif
            @if ($tipoDte == '09')
                <div style="display: flex">
                    <div style="width: 100%">
                        <b>Código de Empleado: </b>{{ $extension->codEmpleado }}
                    </div>
                </div>
            @endif
            @if ($tipoDte != '09' && $tipoDte != '14')
                <div style="display: flex">
                    <div style="width: 50%">
                        <b>Responsable por parte del Receptor: </b>{{ $extension->nombRecibe }}
                    </div>
                    <div style="width: 50%">
                        <b>No. de Documento: </b>{{ $extension->docuRecibe }}
                    </div>
                </div>
            @endif
            @if ($tipoDte == '01' || $tipoDte == '03')
                <div style="display: flex">
                    <div style="width: 100%">
                        <b>Placa del Vehículo: </b>{{ $extension->placaVehiculo }}
                    </div>
                </div>
            @endif
            @if ($tipoDte != '09')
                <div style="display: flex">
                    <div style="width: 100%">
                        <b>Observaciones: </b>{{ $extension->observaciones }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif

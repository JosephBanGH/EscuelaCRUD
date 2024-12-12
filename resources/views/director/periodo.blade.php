@extends('prueba')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center mb-4">Gestión de Periodos Académicos</h1>
    
    <!-- Resumen de periodos -->
    <div class="row mt-4">
        <div class="">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                <h5 class="card-title">Periodo Activo</h5>
                <p class="card-text display-5 text-center">
                    @if ($periodoActivo = $periodos->where('estado', 1)->first())
                        {{ \Carbon\Carbon::parse($periodoActivo->inicioPeriodo)->format('d/m/Y') }} - 
                        {{ \Carbon\Carbon::parse($periodoActivo->finPeriodo)->format('d/m/Y') }}
                    @else
                        N/A
                    @endif
                </p>



                </div>
            </div>
        </div>

    </div>

    <!-- Formulario para crear nuevo periodo -->
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Crear Nuevo Periodo Académico</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('director.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" id="inicio" name="inicio" class="form-control" value="{{ old('inicio') }}">
                        @error('inicio')
                            <div class="text-danger">La fecha de inicio no debe ser mayor a la final</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="fin" class="form-label">Fecha de Finalización</label>
                        <input type="date" id="fin" name="fin" class="form-control" value="{{ old('fin') }}">
                        @error('fin')
                            <div class="text-danger">La fecha final no debe ser menor a la inicial</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Crear Periodo</button>
                </form>

                </div>
            </div>
        </div>
    </div>

 <!-- Tabla de periodos -->
 <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="text-center mb-4">Periodos Académicos Registrados</h3>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Inicio</th>
                        <th>Finalización</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($periodos as $key => $periodo)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $periodo->idPeriodo }}</td>
                            <td>{{ \Carbon\Carbon::parse($periodo->inicioPeriodo)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($periodo->finPeriodo)->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge {{ $periodo->estado ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $periodo->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('director.cambiarEstado', $periodo->idPeriodo) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-warning btn-sm">
                                        {{ $periodo->estado ? 'Desactivar' : 'Activar' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay periodos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

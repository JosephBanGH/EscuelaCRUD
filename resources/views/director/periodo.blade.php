@extends('prueba')
@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{route('director.general')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item ">
                <a class="nav-link" data-bs-toggle="collapse" href="#preinscripciones" role="button" aria-expanded="false" aria-controls="preinscripciones">
                    <i class="link-icon" data-feather="file-plus"></i>
                    <span class="link-title">Datos</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="preinscripciones">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{route('director.periodo')}}" class="nav-link ">Periodos Academicos</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="" class="nav-link ">Programar Citas</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('director.evaluar')}}" class="nav-link ">Evaluar Estudiante</a>
                    </li>
                </ul>
                </div>
            </li>
        </ul>
    </div> 
@endsection
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

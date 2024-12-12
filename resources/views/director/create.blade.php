@extends('prueba')

@section('sideBody')
<div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{ route('director.general') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#preinscripciones" role="button" aria-expanded="false" aria-controls="preinscripciones">
                    <i class="link-icon" data-feather="file-plus"></i>
                    <span class="link-title">Datos</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="preinscripciones">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('director.periodo') }}" class="nav-link">Periodos Académicos</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Programar Citas</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('director.evaluar') }}" class="nav-link">Evaluar Estudiante</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
@endsection

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center mb-4">Registrar Nueva Evaluación</h1>
    
    <form method="POST" action="{{ route('evaluaciones.store') }}">
        @csrf
        <div class="mb-3">
            <label for="interesado" class="form-label">Estudiante</label>
            <select class="form-control" name="idInteresado" required>
                @foreach($interesados as $interesado)
                    <option value="{{ $interesado->idInteresado }}">{{ $interesado->nombreInteresado }} {{ $interesado->apellidoInteresado }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nota" class="form-label">Nota</label>
            <input type="number" class="form-control" name="nota" required>
        </div>
        <div class="mb-3">
            <label for="fechaEntrevista" class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fechaEntrevista" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Guardar Evaluación</button>
        </div>
    </form>
</div>
@endsection

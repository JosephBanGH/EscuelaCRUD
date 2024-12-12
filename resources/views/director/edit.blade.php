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
<div class="container">
        <h2>Editar Entrevista</h2>
        
        <form action="{{ route('director.update', $entrevista->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Esto es necesario para enviar un PUT request -->

            <div class="form-group">
                <label for="interesado">Nombre del Estudiante:</label>
                <select name="idInteresado" id="interesado" class="form-control">
                    @foreach($entrevistas as $entrevista)
                        <option value="{{ $entrevista->id }}" {{ $entrevista->idInteresado == $interesado->id ? 'selected' : '' }}>
                            {{ $entrevista->interesado->nombreInteresado }} {{ $entrevista->interesado->apellidoInteresado }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nota">Nota:</label>
                <input type="number" name="nota" id="nota" class="form-control" value="{{ old('nota', $entrevista->nota) }}" required min="0" max="20">
            </div>

            <div class="form-group">
                <label for="fechaEntrevista">Fecha de la Entrevista:</label>
                <input type="date" name="fechaEntrevista" id="fechaEntrevista" class="form-control" value="{{ old('fechaEntrevista', $entrevista->fechaEntrevista) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Entrevista</button>
        </form>
    </div>
@endsection

@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Editar Matricula</h1>
        <form method="POST" action="{{ route('matricula.update', $matricula->numMatricula) }}">
            @method('PUT')
            @csrf

     <!-- Código de estudiante -->
    <div class="form-group">
        <label for="codigoEstudiante">Código Estudiante</label>
        <input type="text" class="form-control" name="codigoEstudiante" value="{{ $matricula->alumno->codigoEstudiante }}" >
    </div>

    <!-- Apellido Paterno del estudiante -->
    <div class="form-group">
        <label for="apellidoPaterno">Apellido Paterno</label>
        <input type="text" class="form-control" name="apellidoPaterno" value="{{ $matricula->alumno->apellido_paterno }}" >
    </div>

    <!-- Apellido Materno del estudiante -->
    <div class="form-group">
        <label for="apellidoMaterno">Apellido Materno</label>
        <input type="text" class="form-control" name="apellidoMaterno" value="{{ $matricula->alumno->apellido_materno }}" >
    </div>


    <!-- Nivel (select) -->
    <div class="form-group">
        <label for="nivel">Nivel</label>
        <select name="nivel" class="form-control">
            @foreach($niveles as $nivel)
                <option value="{{ $nivel->idNivel }}" {{ $matricula->seccion->grado->nivel->idNivel == $nivel->idNivel ? 'selected' : '' }}>
                    {{ $nivel->nivel }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Grado (solo lectura) -->
    <div class="form-group">
        <label for="grado">Grado</label>
        <input type="text" class="form-control" name="grado" value="{{ $matricula->seccion->grado->grado }}" >
    </div>

    <!-- Sección (solo lectura) -->
    <div class="form-group">
        <label for="seccion">Sección</label>
        <input type="text" class="form-control" name="seccion" value="{{ $matricula->seccion->seccion }}" >
    </div>


    <!-- Escala -->
    <div class="form-group">
        <label for="escala">Escala</label>
        <input type="text" class="form-control" name="escala" value="{{ $matricula->alumno->escala->escala }}" >
    </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('matricula.index') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection

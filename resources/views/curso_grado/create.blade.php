@extends('prueba')

@section('titulo')
    <title>Crear Curso Grado</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Crear Nuevo Curso Grado</h3>
        
        @if (session('error'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form method="POST" action="{{ route('curso_grado.store') }}">
            @csrf

            <div class="form-group">
                <label for="id_curso">Curso</label>
                <select name="id_curso" id="id_curso" class="form-control">
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id_curso }}">{{ $curso->nombre_curso }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_grado">Grado</label>
                <select name="id_grado" id="id_grado" class="form-control">
                    @foreach($grados as $grado)
                        <option value="{{ $grado->id_grado }}">{{ $grado->grado }} - {{ $grado->seccion }} ({{ $grado->nivel }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="periodo_escolar">Periodo Escolar</label>
                <input type="text" name="periodo_escolar" id="periodo_escolar" class="form-control" value="{{ old('periodo_escolar') }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('curso_grado.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

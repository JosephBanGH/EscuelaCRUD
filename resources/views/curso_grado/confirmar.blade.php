@extends('prueba')

@section('titulo')
    <title>Confirmar Eliminación</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Confirmar Eliminación</h3>

        <div class="alert alert-danger">
            <strong>¿Estás seguro de que deseas eliminar este registro?</strong>
            <p>Curso: {{ $cursoGrado->curso->nombre_curso }}</p>
            <p>Grado: {{ $cursoGrado->grado->grado }} - {{ $cursoGrado->grado->seccion }}</p>
            <p>Periodo Escolar: {{ $cursoGrado->periodo_escolar }}</p>
        </div>

        <form method="POST" action="{{ route('curso_grado.destroy', $cursoGrado->id) }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="{{ route('curso_grado.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

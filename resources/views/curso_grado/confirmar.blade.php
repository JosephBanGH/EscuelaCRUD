@extends('prueba')

@section('titulo')
    <title>Confirmar Eliminación</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Confirmar Eliminación</h4>
            </div>
            <div class="card-body text-center">
                <p class="mb-4">
                    ¿Está seguro de que desea eliminar este registro?<br>
                    <strong>ID Curso:</strong> {{ $cursoGrado->curso->id_curso }}<br>
                    <strong>Nombre del Curso:</strong> {{ $cursoGrado->curso->nombre_curso }}<br>
                    <strong>ID Grado:</strong> {{ $cursoGrado->grado->id_grado }}<br>
                    <strong>Grado:</strong> {{ $cursoGrado->grado->nombre_grado }}<br>
                    <strong>Nivel:</strong> {{ $cursoGrado->nivel }}<br>
                    <strong>Periodo Escolar:</strong> {{ $cursoGrado->periodo_escolar }}
                </p>
                <form method="POST" action="{{ route('curso_grado.destroy', $cursoGrado->curso->id_curso) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-warning btn-lg">
                        <i class="fas fa-check-square"></i> Eliminar
                    </button>
                    <a href="{{ route('curso_grado.index') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-times-circle"></i> Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection

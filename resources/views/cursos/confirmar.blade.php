@extends('prueba')

@section('titulo')
    <title>Confirmar Cambio de Estado</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Confirmar Cambio de Estado</h4>
            </div>
            <div class="card-body text-center">
                <p class="mb-4">
                    ¿Está seguro de que desea cambiar el estado del registro a inactivo?<br>
                    <strong>ID Curso:</strong> {{ $curso->id_curso }}<br>
                    <strong>Nombre del Curso:</strong> {{ $curso->nombre_curso }}
                </p>
                <form method="POST" action="{{ route('curso.destroy', $curso->id_curso) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-warning btn-lg">
                        <i class="fas fa-check-square"></i> Eliminar
                    </button>
                    <a href="{{ route('curso.index') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-times-circle"></i> Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection

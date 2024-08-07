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
                    ¿Está seguro de que desea eliminar el registro?<br>
                    <strong>ID Capacidad:</strong> {{ $capacidad->id_capacidad }}<br>
                    <strong>Descripcion de la capacidad:</strong> {{ $capacidad->descripcion_capacidad }}
                </p>
                <form method="POST" action="{{ route('capacidad.destroy', $capacidad->id_capacidad) }}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg">
                        <i class="fas fa-check-square"></i> Eliminar
                    </button>
                    <a href="{{ route('capacidad.cancelar') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-times-circle"></i> Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection

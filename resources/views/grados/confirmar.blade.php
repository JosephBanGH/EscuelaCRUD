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
                    <strong>ID Grado:</strong> {{ $grado->id_grado }}<br>
                    <strong>Nombre del Grado:</strong> {{ $grado->nombre_grado }}
                </p>
                <form method="POST" action="{{ route('grado.destroy', $grado->id_grado) }}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg">
                        <i class="fas fa-check-square"></i> Eliminar
                    </button>
                    <a href="{{ route('grado.cancelar') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-times-circle"></i> Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection

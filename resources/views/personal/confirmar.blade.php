@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Confirmar Eliminación</h4>
            </div>
            <div class="card-body text-center">
                <p class="mb-4">
                    ¿Está seguro de que desea eliminar el registro?<br>
                    <strong>Código:</strong> {{ $personal->codigo_docente }}<br>
                    <strong>Nombres:</strong> {{ $personal->nombres }}
                </p>
                <form method="POST" action="{{ route('personal.destroy', $personal->codigo_docente) }}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg">
                        <i class="fas fa-check-square"></i> Sí, Eliminar
                    </button>
                    <a href="{{ route('cancelar') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-times-circle"></i> No, Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection

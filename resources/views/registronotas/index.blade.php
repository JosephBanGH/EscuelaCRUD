@extends('prueba')

@section('titulo')
    <title>Sistemas de Ventas - Cursos</title>
@endsection

@section('contenido')
    <div class="container">
        <h1>Registro de Notas</h1>
        <a href="{{ route('registronotas.create') }}" class="btn btn-primary">Crear Nuevo Registro</a>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cátedra</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registroNotas as $registroNota)
                    <tr>
                        <td>{{ $registroNota->id_registro }}</td>
                        <td>{{ $registroNota->catedra->curso->nombre_curso }}</td> <!-- Asegúrate de que 'catedra' sea un campo válido en la relación -->
                        <td>{{ $registroNota->fecha->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('registronotas.edit', $registroNota->id_registro) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('registronotas.destroy', $registroNota->id_registro) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?');">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

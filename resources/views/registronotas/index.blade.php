@extends('prueba')

@section('titulo')
    <title>Sistemas de Ventas - Cursos</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Registro de Notas</h1>
        
        <!-- Botón para Crear Nuevo Registro -->
        <div class="mb-3">
            <a href="{{ route('registronotas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Crear Nuevo Registro
            </a>
        </div>

        <!-- Formulario para Importar Excel -->
        <div class="mb-4">
                @csrf
                <label for="archivo_excel" class="form-label">Importar Excel:</label>
                <input type="file" name="archivo_excel" id="archivo_excel" accept=".xlsx, .xls, .csv" class="form-control mb-3" required>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-upload"></i> Subir
                </button>
        </div>

        <!-- Mensajes de éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla de Registros -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
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
                            <td>{{ $registroNota->id_registronotas }}</td>
                            <td>{{ $registroNota->id_curso }}</td> <!-- Asegúrate de que 'id_curso' sea válido -->
                            <td>{{ $registroNota->fecha }}</td>
                            <td class="d-flex">
                                <!-- Botón Editar -->
                                <a href="{{ route('registronotas.edit', $registroNota->id_registronotas) }}" class="btn btn-warning btn-sm me-2">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                
                                <!-- Botón Eliminar -->
                                <form action="{{ route('registronotas.destroy', $registroNota->id_registronotas) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este registro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

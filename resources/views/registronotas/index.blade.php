@extends('prueba')

@section('titulo')
    <title>Sistemas de Ventas - Notas</title>
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
            <form action="{{ route('registronotas.importar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="archivo_excel">Importar archivo Excel:</label>
                <input type="file" name="archivo_excel" id="archivo_excel" accept=".xlsx,.xls,.csv" class="form-control mb-3" required>
                <button type="submit" class="btn btn-success">Subir</button>
            </form>
        </div>

        <!-- Mensajes de éxito o error -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tabla de Registros -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
<<<<<<< HEAD
                        <th>ID</th>
                        <th>Cátedra</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
=======
                        <td>{{ $registroNota->id_registronotas }}</td>
                        <td>{{ $registroNota->curso->nombre_curso}},{{ $registroNota->personal->apellidos }}</td> <!-- Asegúrate de que 'catedra' sea un campo válido en la relación -->
                        <td>{{ $registroNota->fecha }}</td>
                        <td>
                            <a href="{{Route('registronotas.edit', $registroNota->id_registronotas) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="oute('registronotas.destroy', $registroNota->id_registro) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?');">
                                    Eliminar
                                </button>
                            </form>
                        </td>
>>>>>>> d16ae3c (Se tiene listo la seccion de busqueda de estudiante pero aun vamos a la mitad de matriculas)
                    </tr>
                </thead>
                <tbody>
                    @forelse($registroNotas as $registroNota)
                        <tr>
                            <td>{{ $registroNota->id_registronotas }}</td>
                            <td>{{ $registroNota->id_curso }}</td>
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
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay registros disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('prueba')

@section('titulo')
    <title>Sistemas de Ventas - Capacidades</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Listado de Capacidades</h3>
        
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('capacidad.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Registro
            </a>
        </div>
        
        @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                {{ session('datos') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($capacidades->isEmpty())
            <div class="alert alert-info mt-3" role="alert">
                No hay resultados para la búsqueda.
            </div>
        @else
            <div class="table-responsive">
                <table id="capacidadTable" class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID capacidad</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Abreviatura</th>
                            <th scope="col">ID curso</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($capacidades as $capacidad)
                            <tr>
                                <td>{{ $capacidad->id_capacidad }}</td>
                                <td>{{ $capacidad->descripcion_capacidad }}</td>
                                <td>{{ $capacidad->abrebiatura_capacidad }}</td>
                                <td>{{ $capacidad->id_curso }}</td> <!-- Cambiado de seccion->abrebiatura_seccion a seccion -->
                                <td>
                                    <a href="{{ route('capacidad.edit', $capacidad->id_capacidad) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('capacidad.confirmar', $capacidad->id_capacidad) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

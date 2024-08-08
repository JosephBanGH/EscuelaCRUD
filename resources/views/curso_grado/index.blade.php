@extends('prueba')

@section('titulo')
    <title>Cursos por Grado</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Cursos por Grado</h3>

        <!-- Botón para nuevo registro -->
        <div class="mb-4">
            <a href="{{ route('curso_grado.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Registro
            </a>
        </div>

        <!-- Formulario de búsqueda -->
        <form class="form-inline mb-4" method="GET" action="{{ route('curso_grado.index') }}">
            <div class="input-group mr-2 mb-2">
                <input class="form-control" type="search" placeholder="Buscar por nombre" name="buscarpor" value="{{ request()->get('buscarpor') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="submit">
                        <i class="fas fa-search"></i> Buscar Nombre
                    </button>
                </div>
            </div>
            <div class="input-group mb-2">
                <input class="form-control" type="search" placeholder="Buscar por periodo escolar" name="buscarperiodo" value="{{ request()->get('buscarperiodo') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="submit">
                        <i class="fas fa-search"></i> Buscar Periodo
                    </button>
                </div>
            </div>
        </form>

        @if ($cursoGrado->isEmpty())
            <div class="alert alert-info" role="alert">
                No hay cursos para mostrar.
            </div>
        @else
            <div class="table-responsive mt-4">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Curso</th>
                            <th scope="col">Nombre del Curso</th>
                            <th scope="col">ID Grado</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Nivel</th>
                            <th scope="col">Periodo Escolar</th>
                            <th scope="col" class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursoGrado as $item)
                            <tr>
                                <td>{{ $item->curso->id_curso }}</td>
                                <td>{{ $item->curso->nombre_curso }}</td>
                                <td>{{ $item->grado->id_grado }}</td>
                                <td>{{ $item->grado->nombre_grado }}</td>
                                <td>{{ $item->nivel }}</td>
                                <td>{{ $item->periodo_escolar }}</td>
                                <td class="text-center">
                                    <!-- Botón Editar -->
                                    <a href="{{ route('curso_grado.edit', $item->curso->id_curso) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>

                                    <!-- Botón Eliminar -->
                                    <a href="{{ route('curso_grado.confirmar', $item->curso->id_curso) }}" class="btn btn-danger btn-sm">
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

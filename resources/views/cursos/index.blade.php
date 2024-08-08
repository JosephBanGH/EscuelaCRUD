@extends('prueba')

@section('titulo')
    <title>Sistemas de Ventas - Cursos</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Listado de Cursos</h3>
        
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('curso.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Curso
            </a>
            <form class="form-inline" method="GET" action="{{ route('curso.index') }}">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Buscar por nombre" name="buscarpor" value="{{ request()->get('buscarpor') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                {{ session('datos') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($cursos->isEmpty())
            <div class="alert alert-info mt-3" role="alert">
                No hay resultados para la búsqueda.
            </div>
        @else
            <div class="table-responsive mt-4">
                <table id="cursoTable" class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Curso</th>
                            <th scope="col">Nombre del Curso</th>
                            <th scope="col" class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursos as $curso)
                            <tr>
                                <td>{{ $curso->id_curso }}</td>
                                <td>{{ $curso->nombre_curso }}</td>
                                <td class="text-center">
                                    <a href="{{ route('curso.edit', $curso->id_curso) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('curso.confirmar', $curso->id_curso) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    {{ $cursos->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection

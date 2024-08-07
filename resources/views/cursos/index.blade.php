@extends('prueba')

@section('titulo')
    <title>Sistemas de Ventas - Cursos</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Listado de Cursos</h3>
        
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('cursos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Registro
            </a>
            <form class="form-inline" method="GET" action="{{ route('cursos.index') }}">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" name="buscarpor" value="{{ request()->get('buscarpor') }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
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
            <div class="table-responsive">
                <table id="cursoTable" class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Curso</th>
                            <th scope="col">Nombre del Curso</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursos as $curso)
                            <tr>
                                <td>{{ $curso->id_curso }}</td>
                                <td>{{ $curso->nombre_curso }}</td>
                                <td>
                                    <a href="{{ route('cursos.edit', $curso->id_curso) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('cursos.confirmar', $curso->id_curso) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $cursos->links() }}
            </div>
        @endif
    </div>
@endsection

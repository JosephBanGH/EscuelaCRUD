@extends('prueba')

@section('titulo')
    <title>Sistemas de Ventas - Secciones</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Listado de Secciones</h3>
        
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('secciones.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Registro
            </a>
            <form class="form-inline" method="GET" action="{{ route('secciones.index') }}">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar por descripción" name="buscarpor" value="{{ request()->get('buscarpor') }}">
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

        @if ($secciones->isEmpty())
            <div class="alert alert-info mt-3" role="alert">
                No hay resultados para la búsqueda.
            </div>
        @else
            <div class="table-responsive">
                <table id="seccionTable" class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Sección</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($secciones as $seccion)
                            <tr>
                                <td>{{ $seccion->id_seccion }}</td>
                                <td>{{ $seccion->descripcion }}</td>
                                <td>
                                    <a href="{{ route('secciones.edit', $seccion->id_seccion) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('secciones.confirmar', $seccion->id_seccion) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $secciones->links() }}
            </div>
        @endif
    </div>
@endsection

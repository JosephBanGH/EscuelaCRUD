@extends('prueba')

@section('titulo')
    <title>Sistemas de Ventas - Personal</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Listado de Personal</h3>
        
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('personal.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Registro
            </a>
            
            <form class="form-inline" method="GET" action="{{ route('personal.index') }}">
                <div class="input-group">
                    <input name="buscarpor" class="form-control" type="search" placeholder="Buscar por nombres" aria-label="Search" value="{{ request('buscarpor') }}">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">
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

        @if ($personal->isEmpty())
            <div class="alert alert-info mt-3" role="alert">
                No hay resultados para la búsqueda.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código Docente</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Estado Civil</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Seguro Social</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Fecha de Ingreso</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personal as $itempersonal)
                            <tr>
                                <td>{{ $itempersonal->codigo_docente }}</td>
                                <td>{{ $itempersonal->DNI }}</td>
                                <td>{{ $itempersonal->nombres }}</td>
                                <td>{{ $itempersonal->apellidos }}</td>
                                <td>{{ $itempersonal->direccion }}</td>
                                <td>{{ $itempersonal->estado_civil }}</td>
                                <td>{{ $itempersonal->telefono }}</td>
                                <td>{{ $itempersonal->seguro_social }}</td>
                                <td>{{ $itempersonal->departamento }}</td>
                                <td>{{ \Carbon\Carbon::parse($itempersonal->fecha_registro)->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('personal.edit', $itempersonal->codigo_docente) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('personal.confirmar', $itempersonal->codigo_docente) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $personal->links() }}
            </div>
        @endif
    </div>
@endsection

@extends('prueba')

@section('titulo')
    <title>Sistemas de Ventas - Grados</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Listado de Grados</h3>
        
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('grado.create') }}" class="btn btn-primary">
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

        @if ($grados->isEmpty())
            <div class="alert alert-info mt-3" role="alert">
                No hay grados activos.
            </div>
        @else
            <div class="table-responsive">
                <table id="gradoTable" class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Grado</th>
                            <th scope="col">Nivel</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Sección</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grados as $grado)
                            <tr>
                                <td>{{ $grado->id_grado }}</td>
                                <td>{{ $grado->nivel }}</td>
                                <td>{{ $grado->grado }}</td>
                                <td>{{ $grado->seccion }}</td>
                                <td>
                                    <a href="{{ route('grado.edit', $grado->id_grado) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('grado.confirmar', $grado->id_grado) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $grados->links() }}
            </div>
        @endif
    </div>
@endsection

@extends('prueba')

@section('titulo')
    <title>Sistemas de Ventas - Catedra</title>
@endsection

@section('contenido')
<div class="container">
    <h3> LISTADO DE CATEDRAS </h3>
    <br>
    <a href="{{ route('catedra.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo Registro
    </a> 
    <nav class="navbar navbar-light float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Busqueda profesor" aria-label="Search" value="">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>

    @if (session('datos'))
        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            {{ session('datos') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Docente</th>
                <th scope="col">Grado</th>
                <th scope="col">Curso</th>
                <th scope="col">Periodo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catedra as $itemcatedra)
                <tr>
                    <td>{{ $itemcatedra->personal->nombres}}</td>
                    <td>
                        @foreach($itemcatedra->curso_grado as $cursoGrado)
                            <td>{{ $cursoGrado->grado->grado }}, {{ $cursoGrado->grado->seccion }}</td>
                        @endforeach
                    </td>
                    <td>
                        @foreach($itemcatedra->curso_grado as $cursoGrado)
                            <td>{{ $cursoGrado->curso->nombre_curso }}</td>
                        @endforeach
                    </td>
                    <td>{{ $itemcatedra->periodo }}</td>
                    <td>
                        {{-- <a href=" route('catedra.edit', $itemcatedra->idcatedra) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a> --}}
                        <a href="{{ route('catedra.confirmar', $itemcatedra->codigo_docente) }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $catedra->links() }}
</div>
@endsection

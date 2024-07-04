@extends('prueba')
@section('titulo')
    <title>Sistemas de Ventas - Producto</title>
@endsection
@section('contenido')
    <div class="container">
        <h3> LISTADO DE PRODUCTOS </h3>
        <br>
        <a href="{{ route('producto.create') }}" class="btn btn-primary"><i class="fas faplus"></i> Nuevo Registro</a> 
        <nav class="navbar navbar-light float-right">
            <form class="form-inline my-2 my-lg-0" method="GET">
                <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Busqueda por descripcion" arialabel="Search" value="">
                <button class="btn btn-success my-2 my-sm0" type="submit">Buscar</button>
            </form>
        </nav>

        @if (session('datos'))
        <div class="alert alert-warning alert-dismissible fade show mt3" role="alert">
            {{ session('datos') }}
            <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Codigo docente</th>
                <th scope="col">DNI</th>
                <th scope="col">nombres</th>
                <th scope="col">apellidos</th>
                <th scope="col">direccion</th>
                <th scope="col">estado civil</th>
                <th scope="col">telefono</th>
                <th scope="col">seguro social</th>
                <th scope="col">departamento</th>
                <th scope="col">fecha de ingreso</th>
            </tr>
            </thead>
            <tbody>
            @foreach($producto as $itemproducto)
            <tr>
                <td>{{$itemproducto->codigo_docente}}</td>
                <td>{{$itemproducto->DNI}}</td>
                <td>{{$itemproducto->nombres}}</td>
                <td>{{$itemproducto->apellidos}}</td>
                <td>{{$itemproducto->direccion}}</td>
                <td>{{$itemproducto->estado_civil}}</td>
                <td>{{$itemproducto->telefono}}</td>
                <td>{{$itemproducto->seguro_social}}</td>
                <td>{{$itemproducto->departamento}}</td>
                <td>{{$itemproducto->fecha_registro}}</td>
                <td><a href="{{ route('producto.edit',$itemproducto->codigo_docente)}}" class="btn btn-info btnsm">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('producto.confirmar',$itemproducto->codigo_docente)}}" class="btn btn-danger btnsm">
                        <i class="fas fa-trash"></i> Eliminar
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $producto->links()}}
    </div>

@endsection

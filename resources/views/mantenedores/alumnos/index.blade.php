@extends('prueba')

@section('contenido')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">LISTADO DE ALUMNOS</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">

    <a href="{{route('alumno.create')}}" class="btn btn-primary"><i class="fas faplus"></i> Nuevo Registro</a>
    
    <nav class="navbar navbar-light float-right">
      <form class="form-inline my-2 my-lg-0" method="GET">
          <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Busqueda por descripcion" arialabel="Search" value="">
          <button class="btn btn-success my-2 my-sm0" type="submit">Buscar</button>
      </form>
    </nav> 

    @if(session('datos'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" role='alert'>
        {{session('datos')}}
        <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Categoria</th>
            <th scope="col">Unidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
            @if (count($alumno)>=0)
                @foreach($alumno as $itemalumno)
                <tr>
                    <td>{{$itemalumno->alumno_id}}</td>
                    <td>{{$itemalumno->descripcion}}</td>
                    <td>{{$itemalumno->categoria->descripcion}}</td>
                    <td>{{$itemalumno->unidad->descripcion}}</td>
                    <td>{{$itemalumno->precio}}</td>
                    <td>{{$itemalumno->stock}}</td>
                    <td>
                        {{-- <a hre="route('alumno.edit',$itemalumno->alumno_id)}}" class="btn btn-info btnsm"><i class="fas fa-edit"></i> Editar</a>
                        <a hre="route('alumno.confirmar',$itemalumno->alumno_id)}}" class="btn btn-danger btnsm"><i class="fas fa-trash"></i> Eliminar</a> --}}
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
 </table>
    {{$alumno->links()}}
</div>

</section>
@endsection
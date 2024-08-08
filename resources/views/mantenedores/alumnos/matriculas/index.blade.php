@extends('prueba')

@section('contenido')
<section class="content">

<!-- Default box -->
<div class="container mt-4">
    <h3 class="mb-4">Listado de Matriculas</h3>

    <div class="d-flex justify-content-between mb-4">
        <a href="{{route('matricula.create')}}" class="btn btn-alert"><i class="fas fa-faplus"></i> MATRICULAR</a>
        
        <form class="form-inline" method="GET">
            <div class="input-group">
                <input name="buscarpor" class="form-control" type="search" placeholder="Buscar por apellido paterno" aria-label="Search" value="{{ request('buscarpor') }}">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit"><i class="fas fa-search"></i>Buscar</button>
                </div>
            </div>
        </form>
    </div>
                
    @if(session('datos'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" role='alert'>
        {{session('datos')}}
        <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    <table id="table" class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">nroMatricula</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Grado a matricular</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
            @if (count($matricula)>=0)
                @foreach($matricula as $itemmatricula)
                <tr>
                    <td>{{$itemmatricula->numero_matricula}}</td>
                    <td>{{$itemmatricula->alumno->apellido_paterno}}</td>
                    <td>{{$itemmatricula->alumno->apellido_materno}}</td>
                    <td>{{$itemmatricula->grado->grado}} {{$itemmatricula->grado->seccion}}, {{$itemmatricula->grado->nivel}}</td>
                    <td>
                        <a href="{{ route('matricula.edit', $itemmatricula->numero_matricula) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-pencil-alt"></i> Editar
                        </a>
                        <a href="{{ route('matricula.confirmar', $itemmatricula->numero_matricula) }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </a>    
                    </td>

                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
    <div class="d-flex justify-content-center mt-4">
        {{ $matricula->links() }}
    </div>
</div>
@endsection
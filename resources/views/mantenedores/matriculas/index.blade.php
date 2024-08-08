@extends('prueba')


@section('contenido')
<section class="content">

<!-- Default box -->
<div class="container mt-4">
    <h3 class="mb-4">Listado de Matriculas</h3>

    <div class="d-flex justify-content-between mb-4">
        <a href="{{route('matricula.create')}}" class="btn btn-danger"><i class="fas fa-faplus"></i> MATRICULAR</a>
        
        <select name="buscarpor" class="form-control">
            <option value="">Selecciona un grado</option>
            <option value="Inicial" {{ request('buscarpor') }}>Inicial</option>
            <option value="Primaria" {{ request('buscarpor') }}>Primaria</option>
            <option value="Secundaria" {{ request('buscarpor') }}>Secundaria</option>
        </select>

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
            <th scope="col">Fecha</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
            @if ($matricula->isEmpty())
                <div class="alert alert-info mt-3" role="alert">
                    No hay resultados para la búsqueda.
                </div>
            @else
                @foreach($matricula as $itemmatricula)
                <tr>
                    <td>{{$itemmatricula->numero_matricula}}</td>
                    <td>{{$itemmatricula->alumno->apellido_paterno}}</td>
                    <td>{{$itemmatricula->alumno->apellido_materno}}</td>
                    <td>{{$itemmatricula->grado->grado}} {{$itemmatricula->grado->seccion}}, {{$itemmatricula->grado->nivel}}</td>
                    <td>{{$itemmatricula->fecha}}</td>
                    <td>
                        <a href="{{ route('matricula.edit', $itemmatricula->numero_matricula) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-pencil-alt"></i> Editar
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
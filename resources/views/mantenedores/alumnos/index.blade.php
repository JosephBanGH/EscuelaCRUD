@extends('prueba')

@section('contenido')
<section class="content">

<!-- Default box -->
<div class="container mt-4">
    <h3 class="mb-4">Listado de Alumnos</h3>

    <div class="d-flex justify-content-between mb-4">
        <a href="{{route('alumno.create')}}" class="btn btn-primary"><i class="fas faplus"></i> Nuevo Registro</a>
        
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
<div class="table-responsive">
    <table id="personalTable" class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Primer Nombre</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Otros Nombres</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
            @if (count($alumno)>=0)
                @foreach($alumno as $itemalumno)
                <tr>
                    <td>{{$itemalumno->codigo_estudiante}}</td>
                    <td>{{$itemalumno->primer_nombre}}</td>
                    <td>{{$itemalumno->apellido_paterno}}</td>
                    <td>{{$itemalumno->apellido_materno}}</td>
                    <td>{{$itemalumno->otros_nombres}}</td>
                    <td>
                        <a href="{{ route('alumno.edit', $itemalumno->codigo_estudiante) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-pencil-alt"></i> Editar
                        </a>
                        <a href="{{ route('alumno.confirmar', $itemalumno->codigo_estudiante) }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </a>    
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
    <div class="d-flex justify-content-center mt-4">
        {{ $alumno->links() }}
    </div>
@endif
</div>
{{-- 
<script>
    $(document).ready(function() {
        $('#personalTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</section> --}}
@endsection
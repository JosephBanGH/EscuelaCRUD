@extends('prueba')

@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{ route('director.general') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#preinscripciones" role="button" aria-expanded="false" aria-controls="preinscripciones">
                    <i class="link-icon" data-feather="file-plus"></i>
                    <span class="link-title">Datos </span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="preinscripciones">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('director.periodo') }}" class="nav-link">Periodos Académicos</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Programar Citas</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('director.evaluar') }}" class="nav-link">Evaluar Estudiante</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
@endsection

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center mb-4">Evaluación de Estudiantes</h1>
    
    <!-- Botón de registro -->
    <div class="text-center mb-4">
        <a href="" class="btn btn-primary btn-lg">Registrar Nueva Evaluación</a>
    </div>

    <!-- Tabla de evaluaciones -->
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center mb-4">Lista de Evaluaciones</h3>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre del Estudiante</th>
                        <th>DNI</th>
                        <th>Nota</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entrevistas as $entrevista)
                        <tr>
                            <td>{{ $loop->iteration }}</td>                           
                            <td>{{ $entrevista->interesado->nombreInteresado }} {{ $entrevista->interesado->apellidoInteresado }}</td>
                            <td>{{ $entrevista->interesado->dni }}</td> 
                            <td>{{ $entrevista->nota }}</td>
                            <td>{{ $entrevista->fechaEntrevista }}</td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

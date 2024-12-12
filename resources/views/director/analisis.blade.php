@extends('prueba')

@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{route('director.general')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item ">
                <a class="nav-link" data-bs-toggle="collapse" href="#preinscripciones" role="button" aria-expanded="false" aria-controls="preinscripciones">
                    <i class="link-icon" data-feather="file-plus"></i>
                    <span class="link-title">Datos</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="preinscripciones">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{route('director.periodo')}}" class="nav-link ">Periodos Academicos</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="" class="nav-link ">Programar Citas</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('director.evaluar')}}" class="nav-link ">Evaluar Estudiante</a>
                    </li>
                </ul>
                </div>
            </li>
        </ul>
    </div> 
@endsection
@section('contenido')
<div class="container mt-5">
    <h1 class="text-center mb-4">Análisis de Preinscripciones</h1>
    
    <!-- Tarjetas resumen -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Preinscripciones</h5>
                    <p class="card-text display-5 text-center">{{ $preinscripciones->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Aprobadas</h5>
                    <p class="card-text display-5 text-center">{{ $preinscripciones->where('estado', 1)->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Rechazadas</h5>
                    <p class="card-text display-5 text-center">{{ $preinscripciones->where('estado', 0)->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de preinscripciones -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="text-center mb-4">Lista de Preinscripciones</h3>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre Apoderado</th>
                        <th>DNI</th>
                        <th>Correo</th>
                        <th>Fecha de Preinscripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($preinscripciones as $preinscripcion)
                        <tr>
                            <td>{{ $preinscripcion->idPreinscripcion }}</td>
                            <td>{{ explode(' ', $preinscripcion->nombreApoderado)[0] }} {{ explode(' ', $preinscripcion->apellidoApoderado)[0] }}</td>
                            <td>{{ $preinscripcion->dni }}</td>
                            <td>{{ $preinscripcion->correo }}</td>
                            <td>{{ $preinscripcion->fechaPreinscripcion }}</td>
                            <td>
                                <span class="badge {{ $preinscripcion->estado == 1 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $preinscripcion->estado == 1 ? 'Aprobado' : 'Rechazado' }}
                                </span>
                            </td>
                            <td>
                                <!-- Botón para abrir el modal con los detalles -->
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detallesModal{{ $preinscripcion->idPreinscripcion }}">Ver Detalles</button>
                            </td>
                        </tr>

                        <!-- Modal para mostrar los detalles -->
                        <div class="modal fade" id="detallesModal{{ $preinscripcion->idPreinscripcion }}" tabindex="-1" role="dialog" aria-labelledby="detallesModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detallesModalLabel">Detalles de la Preinscripción</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nombre Apoderado:</strong> {{ $preinscripcion->nombreApoderado }} {{ $preinscripcion->apellidoApoderado }}</p>
                                        <p><strong>DNI:</strong> {{ $preinscripcion->dni }}</p>
                                        <p><strong>Correo:</strong> {{ $preinscripcion->correo }}</p>
                                        <p><strong>Teléfono:</strong> {{ $preinscripcion->numTelefono }}</p>
                                        <p><strong>Fecha de Preinscripción:</strong> {{ $preinscripcion->fechaPreinscripcion }}</p>
                                        <p><strong>Estado:</strong> 
                                            <span class="badge {{ $preinscripcion->estado == 1 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $preinscripcion->estado == 1 ? 'Aprobado' : 'Rechazado' }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

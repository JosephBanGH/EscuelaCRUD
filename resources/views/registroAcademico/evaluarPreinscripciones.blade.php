@extends('prueba')

@section('styles')
    
@endsection

@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{route('registroAcademico.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item ">
                <a class="nav-link" data-bs-toggle="collapse" href="#preinscripciones" role="button" aria-expanded="false" aria-controls="preinscripciones">
                    <i class="link-icon" data-feather="file-plus"></i>
                    <span class="link-title">PREINSCRIPCIONES</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="preinscripciones">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{route('addPreinscripciones')}}" class="nav-link ">Registrar Preinscripciones</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{route('evaluarPreinscripciones')}}" class="nav-link ">Evaluar Preinscripciones</a>
                    </li>
                </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-bs-toggle="collapse" href="#matriculas" role="button" aria-expanded="false" aria-controls="matriculas">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">MATRICULAS</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="matriculas">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('buscarMatricula')}}" class="nav-link ">Editar Matricula</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div> 
@endsection

@section('contenido')
    <h4>Solicitudes de Preinscripción</h4>
    <table class="table table-striped mt-2 ml-4 mr-4">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Apoderado</th>
            <th scope="col">Dni</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($preinscripciones as $preinscripcion)
                <tr>
                    <th scope="row">{{ $preinscripcion->idPreinscripcion }}</th>
                    <td>{{$preinscripcion->apellidoApoderado}}, {{$preinscripcion->nombreApoderado}}</td>
                    <td>{{$preinscripcion->dni}}</td>
                    <td>{{$preinscripcion->numTelefono}}</td>
                    <td>{{$preinscripcion->correo}}</td>
                    <td>
                        <button type="button" class="btn btn-primary">Evaluar</button>
                        <button type="button" class="btn btn-primary"><a style="color: white" href="{{Route('director.programar',[$preinscripcion->idPreinscripcion])}}">Programar</a></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection


@extends('prueba')

@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{route('preinscripcionIndex',['idPreinscripcion' => $idPreinscripcion])}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{route('expedienteAdmision',['idInteresado' => $interesado->idInteresado])}}" class="nav-link ">Expediente</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('entrevista',['idInteresado' => $interesado->idInteresado])}}" class="nav-link ">Entrevista</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('observacion',['idInteresado' => $interesado->idInteresado])}}" class="nav-link ">Observaciones</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

@section('contenido')
    
@endsection



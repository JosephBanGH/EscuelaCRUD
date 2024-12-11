@extends('prueba')

@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{route('preinscripcionIndex',['idPreinscripcion' => $preinscripcion->idPreinscripcion])}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
        </ul>
    </div>
@endsection


@section('contenido')
    
    <div class="cont">
        <h1>Bienvenido, {{ $preinscripcion->nombreApoderado }} {{ $preinscripcion->apellidoApoderado }}</h1>

        <h2 class="">Procesos de Preinscripcion abiertas</h2>
        
        <div class="container">
            <div class="d-flex flex-column flex-md-row">
                @foreach($preinscripcion->interesado as $interesado)
                    <a href="{{ route('entrevista',['idInteresado' => $interesado->idInteresado]) }}" class="d-flex flex-column align-items-center bg-dark text-white rounded shadow ms-0 ms-md-2 mb-3 mb-md-0" style="width: 18rem;">
                        <img src="{{ asset('/img/usuario.png') }}" alt="Foto de {{ $interesado->nombreInteresado }}" class="img-fluid rounded-top" style="height: 24rem; object-fit: cover;">
                        <div class="p-3" style="height: 6rem;">
                            <p class="mb-0">{{ $interesado->nombreInteresado }} {{ $interesado->apellidoInteresado }} - DNI: {{ $interesado->dni }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        
    </div>
@endsection
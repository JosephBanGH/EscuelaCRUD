@extends('prueba')


@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="route('inicioDireccion')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item ">
                <a class="nav-link" data-bs-toggle="collapse" href="#periodo" role="button" aria-expanded="false" aria-controls="periodo">
                  <i class="link-icon" data-feather="mail"></i>
                  <span class="link-title">PERIODO</span>
                  <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse " id="periodo">
                  <ul class="nav sub-menu">
                    <li class="nav-item">
                      <a href="{{route('myPeriodo.index')}}" class="nav-link ">Nuevo Periodo</a>
                    </li>
                  </ul>
                </div>
              </li>
        </ul>
    </div> 
@endsection

@section('contenido')
    <h1>DIRECTOR</h1>

    
@endsection
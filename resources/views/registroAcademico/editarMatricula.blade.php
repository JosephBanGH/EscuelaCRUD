@extends('prueba')


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
                <a class="nav-link" data-bs-toggle="collapse" href="#comprobante" role="button" aria-expanded="false" aria-controls="comprobante">
                  <i class="link-icon" data-feather="mail"></i>
                  <span class="link-title">COMPROBANTES</span>
                  <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse " id="comprobante">
                  <ul class="nav sub-menu">
                    <li class="nav-item">
                      <a href="{{route('verificarComprobantes')}}" class="nav-link ">Verificar validez</a>
                    </li>
                  </ul>
                </div>
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
        </ul>
    </div> 
@endsection

@section('contenido')
    <form action="{{route('updateMatricula',$matricula->numMatricula)}}" method="POST">
        @csrf
        @method('PUT')
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <label for="nombreCompleto" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" id="nombreCompleto" aria-describedby="emailHelp" disabled value="{{$matricula->alumno->apellido_paterno}} {{$matricula->alumno->apellido_materno}}, {{$matricula->alumno->primer_nombre}} {{$matricula->alumno->otros_nombre}}">
        </div>
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" aria-describedby="emailHelp" disabled value="{{$matricula->alumno->dni}}">
        </div>
        <div class="mb-3">
            <label for="seccion" class="form-label">Nivel - Grado - Sección</label>
            <select class="form-select" id="seccion" name="seccion">
                @foreach ($secciones as $seccion)
                    <option value="{{ $seccion->idSeccion }}" 
                        {{ $seccion->idSeccion == $matricula->seccion->idSeccion ? 'selected' : '' }}>
                        {{ $seccion->grado->nivel->nivel }} - {{ $seccion->grado->grado }} - {{ $seccion->seccion }}
                    </option>
                @endforeach
            </select>
        </div>
        @if($periodo->idPeriodo!=$matricula->periodo->idPeriodo and \Carbon\Carbon::parse($periodo->inicioPeriodo)->format('Y')==\Carbon\Carbon::parse($matricula->fechaMatricula)->format('Y'))
            <label for="periodo" class="form-label">Periodo</label>
            <select class="form-select" name="periodo" id="periodo">
                <option value="{{$matricula->periodo->idPeriodo}}" selected>{{\Carbon\Carbon::parse($matricula->periodo->inicioPeriodo)->format('d-m-Y')}} -- {{\Carbon\Carbon::parse($matricula->periodo->finPeriodo)->format('d-m-Y')}}</option>
                <option value="{{$periodo->idPeriodo}}">{{\Carbon\Carbon::parse($periodo->inicioPeriodo)->format('d-m-Y')}} -- {{\Carbon\Carbon::parse($periodo->finPeriodo)->format('d-m-Y')}} Periodo Actual</option>
            </select>
        @else
            <label for="periodo" class="form-label">Periodo</label>
            <input type="text" class="form-control" id="periodo" name="periodo" disabled value="{{\Carbon\Carbon::parse($matricula->periodo->inicioPeriodo)->format('d-m-Y')}} -- {{\Carbon\Carbon::parse($matricula->periodo->finPeriodo)->format('d-m-Y')}}">
        @endif
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
@endsection




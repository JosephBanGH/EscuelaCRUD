@extends('prueba')

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




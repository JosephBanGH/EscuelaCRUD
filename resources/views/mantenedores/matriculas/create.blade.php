@extends('prueba')
@section('contenido')
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .matricula-form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container matricula-form-container">
        <h2 class="text-center">Matrícula de Alumnos</h2>
        <div class="popup">
            <form action="GET">
                
            </form>
        </div>
        <form method="POST" action="{{ route('matricula.store') }}">
        @csrf    
            <div class="form-row">
                <div class="form-group flex flex-row">
                    <label for="">Codigo Estudiante</label>
                    <input type="text" name="codigoEstudiante" id="codigoEstudiante">
                </div>
            </div> 
            <button type="button" id="buscarAlumno">Buscar Alumno</button>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" @error('fecha') is-invalid @enderror" maxlength="9" id="fecha" name="fecha" value="{{ old('fecha') }}">
                @error('fecha')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror 
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="apellidoPaterno">Apellido Paterno</label>
                    <input type="text" name="apellidoPaterno" id="apellidoPaterno">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="apellidoMaterno">Apellido Materno</label>
                    <input type="text" name="apellidoMaterno" id="apellidoMaterno">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="primerNombre">Primer Nombre</label>
                    <input type="text" name="primerNombre" id="primerNombre">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="otrosNombres">Otros Nombres</label>
                    <input type="text" name="otrosNombres" id="otrosNombres">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="nivel">Nivel</label>
                    <select name="nivel" id="nivel">
                        @foreach($nivel as $nivelAlumno)
                            <option value="{{$nivelAlumno->idNivel}}">{{$nivelAlumno->nivel}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="grado">Grado</label>
                    <input type="text" name="grado" id="grado">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="seccion">Seccion</label>
                    <input type="text" name="seccion" id="seccion">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="escala">Escala</label>
                    <input type="text" name="escala" id="escala">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="añoEscolar">Año Escolar</label>
                    <input type="text" name="añoEscolar" id="añoEscolar" value="{{ \Carbon\Carbon::parse($añoEscolar->inicioPeriodo)->format('Y') }}" disabled>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Grabar</button>
            <button type="button" class="btn btn-secondary">Imprimir</button>
            @if(Auth::user()->personal->tipoPersonal->tipoPersonal == 'Tesoreria')
                <button type="button" class="btn btn-secondary">Grabar Tesorería</button>
            @endif
            
            <a href="{{ route('grado.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>

        </form>
    </div>
@endsection

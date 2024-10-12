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

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .popup {
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .popup.show {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="container matricula-form-container" style="position:relative;">
        <h2 class="text-center">Matrícula de Alumnos</h2>
        <div class="popup" style="display:none; position:absolute;background:#ccc;padding:20px; border-radius:10px;">
            <button type="button" id="cerrarPopup" style="position:absolute; top:10px; right:10px;">Cerrar</button>
            <form method="GET" action="{{ route('matricula.create') }}">
                <div class="form-row">
                    <div class="form-group flex flex-row">
                        <label for="buscarApellidos">Apellidos y Nombres</label>
                        <input type="text" name="buscarApellidos" id="buscarApellidos">
                    </div>
                </div> 
                <div class="form-row">
                    <div class="form-group flex flex-row">
                        <label for="buscarPorDni">Ingrese DNI</label>
                        <input type="text" name="buscarPorDni" id="buscarPorDni">
                    </div>
                </div> 
                <button type="submit">Buscar</button>
                <button type="button"><a href="{{ route('alumno.create',['from'=>'matricula']) }}">Crear Alumno</a></button>
            </form>
            @if($alumnoDni) 
            <div>
                <h3>result</h3>
                <p>{{$alumnoDni->primer_nombre}}</p>
            </div>
            @else
                <p>Sin resultados aun</p>
            @endif
        </div>
        <form method="POST" action="{{ route('matricula.store') }}">
        @csrf    
            @if($alumnoDni)
                <div class="form-row">
                    <div class="form-group flex flex-row">
                        <label for="">Codigo Estudiante</label>
                        <input type="text" name="codigoEstudiante" id="codigoEstudiante" value="{{$alumnoDni->codigoEstudiante}}">
                    </div>
                </div> 
            @else
                <div class="form-row">
                    <div class="form-group flex flex-row">
                        <label for="">Codigo Estudiante</label>
                        <input type="text" name="codigoEstudiante" id="codigoEstudiante">
                    </div>
                </div> 
            @endif

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

            @if($alumnoDni)
                <div class="form-row">
                    <div class="form-group">
                        <label for="apellidoPaterno">Apellido Paterno</label>
                        <input type="text" name="apellidoPaterno" id="apellidoPaterno" value="{{$alumnoDni->apellido_paterno}}">
                    </div>
                </div>
            @else
                <div class="form-row">
                    <div class="form-group">
                        <label for="apellidoPaterno">Apellido Paterno</label>
                        <input type="text" name="apellidoPaterno" id="apellidoPaterno">
                    </div>
                </div>
            @endif
            

            @if($alumnoDni)
                <div class="form-row">
                    <div class="form-group">
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <input type="text" name="apellidoMaterno" id="apellidoMaterno" value="{{$alumnoDni->apellido_materno}}">
                    </div>
                </div>
            @else
                <div class="form-row">
                    <div class="form-group">
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <input type="text" name="apellidoMaterno" id="apellidoMaterno">
                    </div>
                </div>
            @endif

            @if($alumnoDni)
                <div class="form-row">
                    <div class="form-group">
                        <label for="primerNombre">Primer Nombre</label>
                        <input type="text" name="primerNombre" id="primerNombre" value="{{$alumnoDni->primer_nombre}}">
                    </div>
                </div>
            @else
                <div class="form-row">
                    <div class="form-group">
                        <label for="primerNombre">Primer Nombre</label>
                        <input type="text" name="primerNombre" id="primerNombre">
                    </div>
                </div>
            @endif


            @if($alumnoDni)
                <div class="form-row">
                    <div class="form-group">
                        <label for="otrosNombres">Otros Nombres</label>
                        <input type="text" name="otrosNombres" id="otrosNombres" value="{{$alumnoDni->otros_nombre}}">
                    </div>
                </div>
            @else
                <div class="form-row">
                    <div class="form-group">
                        <label for="otrosNombres">Otros Nombres</label>
                        <input type="text" name="otrosNombres" id="otrosNombres">
                    </div>
                </div>
            @endif
            

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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($alumnoDni)
                <div class="form-row">
                    <div class="form-group">
                        <label for="escala">Escala</label>
                        <input type="text" name="escala" id="escala" value="{{$alumnoDni->escala->escala}}">
                    </div>
                </div>
            @else
                <div class="form-row">
                    <div class="form-group">
                        <label for="escala">Escala</label>
                        <input type="text" name="escala" id="escala">
                    </div>
                </div>
            @endif
            
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
    <script src="{{ asset('js/mostrarBuscador.js') }}"></script>
@endsection

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
        <form method="POST" action="{{ route('matricula.store') }}">
        @csrf    
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
                    <label for="">Codigo Estudiante</label>
                    <select class="form-control" name="codigo_estudiante" id="codigo_estudiante">
                        @foreach($alumno as $itemalumno)
                        <option value="{{$itemalumno['codigo_estudiante']}}">{{$itemalumno['codigo_estudiante']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>   
            <div class="form-row">
                <div class="form-group">
                    <label for="">Grado</label>
                    <select class="form-control" name="id_grado" id="id_grado">
                        @foreach($grado as $itemgrado)
                        <option value="{{$itemgrado['id_grado']}}">{{$itemgrado['nivel']}},{{$itemgrado['grado']}},{{$itemgrado['seccion']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Grabar</button>
            <button type="button" class="btn btn-secondary">Imprimir</button>
            <button type="button" class="btn btn-secondary">Grabar Tesorería</button>
            <a href="{{ route('grado.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>

        </form>
    </div>
@endsection

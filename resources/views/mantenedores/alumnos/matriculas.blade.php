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
        <form method="POST" action="{{ route('personal.store') }}">
            <div class="form-group">
                <label for="codigoEducando">Código del Educando</label>
                <input type="text" class="form-control" id="codigoEducando" placeholder="00000072830880">
            </div>
            <div class="form-group">
                <label for="nroMatricula">Nro Matrícula</label>
                <input type="text" class="form-control" id="nroMatricula" placeholder="0537">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" value="2016-02-12">
            </div>
            <div class="form-group">
                <label for="apellidoPaterno">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellidoPaterno" placeholder="PALOMINO">
            </div>
            <div class="form-group">
                <label for="apellidoMaterno">Apellido Materno</label>
                <input type="text" class="form-control" id="apellidoMaterno" placeholder="HUR">
            </div>
            <div class="form-group">
                <label for="primerNombre">Primer Nombre</label>
                <input type="text" class="form-control" id="primerNombre" placeholder="Valeska">
            </div>
            <div class="form-group">
                <label for="otrosNombres">Otros Nombres</label>
                <input type="text" class="form-control" id="otrosNombres" placeholder="Priya">
            </div>
            <div class="form-group">
                <label for="nivel">Nivel</label>
                <select class="form-control" id="nivel">
                    <option>Primaria</option>
                    <!-- Otras opciones aquí -->
                </select>
            </div>
            <div class="form-group">
                <label for="anio">Año</label>
                <select class="form-control" id="anio">
                    <option>Primero de Primaria</option>
                    <!-- Otras opciones aquí -->
                </select>
            </div>
            <div class="form-group">
                <label for="seccion">Sección</label>
                <select class="form-control" id="seccion">
                    <option>A</option>
                    <!-- Otras opciones aquí -->
                </select>
            </div>
            <div class="form-group">
                <label for="escala">Escala</label>
                <input type="text" class="form-control" id="escala" placeholder="A">
            </div>
            <div class="form-group">
                <label for="anioEscolar">Año Escolar</label>
                <input type="text" class="form-control" id="anioEscolar" placeholder="2015">
            </div>
            <button type="submit" class="btn btn-primary">Grabar</button>
            <button type="reset" class="btn btn-secondary">Cancelar</button>
            <button type="button" class="btn btn-secondary">Imprimir</button>
            <button type="button" class="btn btn-secondary">Grabar Tesorería</button>
        </form>
    </div>
@endsection

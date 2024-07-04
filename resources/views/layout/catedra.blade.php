@extends('prueba')
@section('contenido')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento de Cátedra</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .table-container {
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
    <div class="container form-container">
        <h2 class="text-center">Mantenimiento de Cátedra</h2>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="docente">Docente</label>
                    <input type="text" class="form-control" id="docente" placeholder="A070">
                </div>
                <div class="form-group col-md-6">
                    <label for="nombreDocente">Nombre Docente</label>
                    <input type="text" class="form-control" id="nombreDocente" placeholder="ANTONIETA YUPANQUI / OLINDA" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="anioEscolar">Año Escolar</label>
                    <input type="text" class="form-control" id="anioEscolar" placeholder="2015">
                </div>
            </div>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Curso</th>
                            <th>Grado</th>
                            <th>Sección</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CL</td>
                            <td>COMPUTACIÓN / LABORATORIO</td>
                            <td>Primero de Primaria</td>
                            <td>C</td>
                        </tr>
                        <!-- Más filas aquí -->
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary">Insertar</button>
            <button type="button" class="btn btn-danger">Eliminar</button>
            <button type="button" class="btn btn-secondary">Cambiar Profesor</button>
        </form>
    </div>
@endsection
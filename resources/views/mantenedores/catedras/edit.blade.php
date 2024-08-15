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
        <form action="{{route('catedra.store')}}" method="POST" id="formCatedra">

            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="codigo_docente">Docente</label>
                    <select class="form-control" name="codigo_docente" id="codigo_docente">
                        @foreach($personal as $itempersonal)
                            <option value="{{ $itempersonal['codigo_docente'] }}">{{ $itempersonal['nombres'] }},{{ $itempersonal['apellidos'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="curso">Curso</label>
                    <select class="form-control" name="curso" id="curso">
                        @foreach($curso_grado as $itemcurso_grado)
                            <option value="{{ $itemcurso_grado['id_curso'] }}__{{ $itemcurso_grado['id_grado'] }}">
                                {{ $itemcurso_grado->curso->nombre_curso }},{{ $itemcurso_grado->grado->grado }}{{ $itemcurso_grado->grado->seccion }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="periodo">Periodo</label>
                    <input type="text" class="form-control" id="periodo" name="periodo" placeholder="2015">
                </div>
            </div>
            <div class="table-container">
                <table class="table table-striped" id="tableCatedra">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Curso</th>
                            <th>Grado</th>
                            <th>PERIODO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($catedra)>=0)
                            @foreach($catedra as $itemcatedra)
                                <tr>
                                    <td>{{$itemcatedra->personal->nombres}}</td>
                                    <td>{{$itemcatedra->idcurso}}</td>
                                    <td>{{$itemcatedra->idgrado}}</td>
                                    <td>{{$itemcatedra->periodo}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
            <button type="button" class="btn btn-danger">Eliminar</button>
            <button type="button" class="btn btn-danger">Eliminar</button>
            <a href="{{route('catedra.index')}}" class="btn btn-secondary left">Volver</a>
        </form>
    </div>
<script>
    $(document).ready(function() {
    $('#formCatedra').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Aquí actualizas la tabla con los nuevos datos
                let newRow = `<tr>
                    <td>${response.personal.nombres}</td>
                    <td>${response.curso.nombre_curso}</td>
                    <td>${response.grado.grado}${response.grado.seccion}</td>
                    <td>${response.periodo}</td>
                </tr>`;
                $('#tablaCatedra').append(newRow);
            },
            error: function(response) {
                alert('Error al agregar la cátedra.');
            }
        });
    });
});
</script>
@endsection
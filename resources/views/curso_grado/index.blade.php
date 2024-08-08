@extends('prueba')

@section('titulo')
    <title>Cursos por Grado</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Cursos por Grado</h3>

        @if ($cursoGrado->isEmpty())
            <div class="alert alert-info" role="alert">
                No hay cursos para mostrar.
            </div>
        @else
            <div class="table-responsive mt-4">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Curso</th>
                            <th scope="col">Nombre del Curso</th>
                            <th scope="col">ID Grado</th>
                            <th scope="col">Nombre del Grado</th>
                            <th scope="col">Periodo Escolar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursoGrado as $item)
                            <tr>
                                <td>{{ $item->curso->id_curso }}</td>
                                <td>{{ $item->curso->nombre_curso }}</td>
                                <td>{{ $item->grado->id_grado }}</td>
                                <td>{{ $item->grado->nombre_grado }}</td>
                                <td>{{ $item->periodo_escolar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

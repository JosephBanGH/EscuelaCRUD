@extends('prueba')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center mb-4">Evaluación de Estudiantes</h1>
    <p class="text-center">Administra y registra evaluaciones de los estudiantes. Genera informes de desempeño y progreso.</p>

    <!-- Botón de registro -->
    <div class="text-center mb-4">
        <a href="{{ route('evaluaciones.create') }}" class="btn btn-primary btn-lg">Registrar Nueva Evaluación</a>
    </div>

    <!-- Tabla de evaluaciones -->
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center mb-4">Lista de Evaluaciones</h3>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre del Estudiante</th>
                        <th>Curso</th>
                        <th>Calificación</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan Pérez</td>
                        <td>Matemáticas</td>
                        <td>18/20</td>
                        <td>2024-05-10</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Editar</button>
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>María López</td>
                        <td>Lenguaje</td>
                        <td>15/20</td>
                        <td>2024-05-11</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Editar</button>
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

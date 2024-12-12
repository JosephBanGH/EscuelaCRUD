@extends('prueba')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center mb-4">Análisis de Expedientes de Admisión</h1>
    <p class="text-center">Consulta y analiza los expedientes presentados por los estudiantes en el proceso de admisión.</p>

    <!-- Tarjetas resumen -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Expedientes</h5>
                    <p class="card-text display-5 text-center">250</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Aprobados</h5>
                    <p class="card-text display-5 text-center">200</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Rechazados</h5>
                    <p class="card-text display-5 text-center">50</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de expedientes -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="text-center mb-4">Lista de Expedientes</h3>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre del Aspirante</th>
                        <th>Documento</th>
                        <th>Estado</th>
                        <th>Fecha de Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan Pérez</td>
                        <td>DNI: 12345678</td>
                        <td><span class="badge bg-success">Aprobado</span></td>
                        <td>2024-04-01</td>
                        <td>
                            <button class="btn btn-info btn-sm">Ver Detalles</button>
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>María López</td>
                        <td>DNI: 87654321</td>
                        <td><span class="badge bg-danger">Rechazado</span></td>
                        <td>2024-04-02</td>
                        <td>
                            <button class="btn btn-info btn-sm">Ver Detalles</button>
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('prueba')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center mb-4">Gestión de Periodos Académicos</h1>
    <p class="text-center">Aquí puedes administrar los periodos académicos. Crea nuevos periodos, visualiza los existentes y activa el periodo correspondiente.</p>

    <!-- Resumen de periodos -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Periodo Activo</h5>
                    <p class="card-text display-5 text-center">2024</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Periodos Registrados</h5>
                    <p class="card-text display-5 text-center">10</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario para crear nuevo periodo -->
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Crear Nuevo Periodo Académico</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('periodos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Periodo</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ej: 2025">
                        </div>
                        <div class="mb-3">
                            <label for="inicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" id="inicio" name="inicio" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="fin" class="form-label">Fecha de Finalización</label>
                            <input type="date" id="fin" name="fin" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Crear Periodo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de periodos -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="text-center mb-4">Periodos Académicos Registrados</h3>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Inicio</th>
                        <th>Finalización</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2024</td>
                        <td>2024-01-01</td>
                        <td>2024-12-31</td>
                        <td><span class="badge bg-success">Activo</span></td>
                        <td>
                            <button class="btn btn-warning btn-sm">Editar</button>
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2023</td>
                        <td>2023-01-01</td>
                        <td>2023-12-31</td>
                        <td><span class="badge bg-secondary">Inactivo</span></td>
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

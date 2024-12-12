@extends('prueba')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center mb-4">Reportes Generales de Matrículas</h1>
    <p class="text-center">
        Esta sección proporciona un análisis detallado de las matrículas registradas en el sistema. Puedes visualizar estadísticas, gráficos y realizar consultas personalizadas.
    </p>

    <!-- Resumen general -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Matrículas</h5>
                    <p class="card-text display-4 text-center">450</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Activas</h5>
                    <p class="card-text display-4 text-center">380</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pendientes</h5>
                    <p class="card-text display-4 text-center">50</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Anuladas</h5>
                    <p class="card-text display-4 text-center">20</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico de estadísticas -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="text-center">Distribución de Matrículas por Niveles</h3>
            <canvas id="matriculasChart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- Tabla de reportes -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="text-center mb-4">Detalles de Matrículas</h3>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre del Estudiante</th>
                        <th>Grado</th>
                        <th>Sección</th>
                        <th>Estado</th>
                        <th>Fecha de Matrícula</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan Pérez</td>
                        <td>Primaria - 4to Grado</td>
                        <td>A</td>
                        <td>Activa</td>
                        <td>2024-03-01</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>María López</td>
                        <td>Secundaria - 1er Año</td>
                        <td>B</td>
                        <td>Pendiente</td>
                        <td>2024-03-02</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pedro Ramírez</td>
                        <td>Inicial - 5 Años</td>
                        <td>C</td>
                        <td>Anulada</td>
                        <td>2024-02-28</td>
                    </tr>
                    <!-- Agregar más filas si es necesario -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script para el gráfico -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('matriculasChart').getContext('2d');
    const matriculasChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Inicial', 'Primaria', 'Secundaria'],
            datasets: [{
                label: 'Cantidad de Matrículas',
                data: [100, 200, 150],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 206, 86, 0.6)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection

@extends('prueba')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center mb-4">📊 Reportes Generales de Matrículas</h1>

    <!-- Resumen general -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow-sm mb-4">
                <div class="card-body d-flex flex-column align-items-center">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h5 class="card-title">Total Matrículas</h5>
                    <p class="card-text display-4">{{ $totalMatriculas }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success shadow-sm mb-4">
                <div class="card-body d-flex flex-column align-items-center">
                    <i class="fas fa-check-circle fa-3x mb-3"></i>
                    <h5 class="card-title">Matrículas Activas</h5>
                    <p class="card-text display-4">{{ $matriculasActivas }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger shadow-sm mb-4">
                <div class="card-body d-flex flex-column align-items-center">
                    <i class="fas fa-times-circle fa-3x mb-3"></i>
                    <h5 class="card-title">Matrículas Anuladas</h5>
                    <p class="card-text display-4">{{ $matriculasAnuladas }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <h4 class="text-center">Estados de Matrículas</h4>
            <canvas id="estadosChart"></canvas>
        </div>
    </div>

    <!-- Tabla de detalles -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="text-center mb-4">📋 Detalles de Matrículas</h3>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Estudiante</th>
                        <th>DNI</th>
                        <th>Sección</th>
                        <th>Periodo</th>
                        <th>Estado</th>
                        <th>Fecha de Matrícula</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($matriculas as $key => $matricula)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $matricula->alumno->primer_nombre }} {{ $matricula->alumno->apellido_paterno }}</td>
                            <td>{{ $matricula->alumno->dni }}</td>
                            <td>{{ $matricula->seccion->seccion }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($matricula->periodo->inicioPeriodo)->format('Y-m-d') }} - 
                                {{ \Carbon\Carbon::parse($matricula->periodo->finPeriodo)->format('Y-m-d') }}
                            </td>
                            <td class="text-center">
                                @if ($matricula->estado === 1)
                                    <span class="badge bg-success">Activa</span>
                                @else
                                    <span class="badge bg-danger">Anulada</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($matricula->fechaMatricula)->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay matrículas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Scripts para los gráficos -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Datos para el gráfico de estados de matrículas
    const estadosData = {
        labels: ['Activas', 'Anuladas'],
        datasets: [{
            data: [{{ $matriculasActivas }}, {{ $matriculasAnuladas }}],
            backgroundColor: ['#28a745', '#dc3545']
        }]
    };

    // Configuración del gráfico
    const estadosChartConfig = {
        type: 'doughnut',
        data: estadosData
    };

    // Inicializar el gráfico de estados
    const estadosChart = new Chart(
        document.getElementById('estadosChart'),
        estadosChartConfig
    );
</script>
@endsection

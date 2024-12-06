@extends('prueba')
@section('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            flex: 1;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #333;
        }

        .chart-container {
            position: relative;
            height: 200px;
        }

        .quick-actions {
            display: flex;
            justify-content: space-between;
        }

        .quick-actions a {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 4px;
            color: white;
            background-color: #007bff;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .quick-actions a:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('contenido')
    <h1>Panel de Tesorería</h1>

    <div class="dashboard-container">
        <!-- Resumen financiero -->
        <div class="card">
            <h3>Resumen Financiero</h3>
            <ul>
                <li>Total de ingresos este mes: <strong>S/ 15,000</strong></li>
                <li>Total de pagos hoy: <strong>S/ 1,200</strong></li>
                <li>Pagos pendientes: <strong>S/ 4,500</strong></li>
            </ul>
        </div>

        <!-- Gráfico de pagos -->
        <div class="card">
            <h3>Pagos Realizados</h3>
            <div class="chart-container">
                <canvas id="pieChart"></canvas>
            </div>
        </div>

        <!-- Tendencias -->
        <div class="card">
            <h3>Tendencia de Pagos</h3>
            <div class="chart-container">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>

    <div class="quick-actions">
        <a href="#">Registrar Pago</a>
        <a href="#">Generar Reporte</a>
        <a href="#">Buscar Historial</a>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Gráfico circular de pagos realizados
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Matrícula', 'Pensiones', 'Otros'],
                datasets: [{
                    data: [50, 30, 20], // Datos simulados
                    backgroundColor: ['#007bff', '#28a745', '#ffc107']
                }]
            }
        });

        // Gráfico de línea de tendencias
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                datasets: [{
                    label: 'Ingresos',
                    data: [12000, 15000, 14000, 17000, 16000], // Datos simulados
                    borderColor: '#007bff',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

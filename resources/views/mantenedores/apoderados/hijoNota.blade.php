@extends('prueba')
@section('styles')
    <style>
        .hijo-dashboard {
            margin: 20px;
            font-family: Arial, sans-serif;
        }

        .hijo-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .info-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        .card p {
            margin: 5px 0;
            color: #555;
        }

        .action-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }

        .action-buttons a {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 4px;
            color: white;
            background-color: #007bff;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .action-buttons a:hover {
            background-color: #0056b3;
        }
        .graficos{
            padding: 2em;
        }
        .reporteNotas{
            text-align: center;
            padding-top:2em;
        }

        .reporteNotas h4{
            color: gray;
        }
    </style>
@endsection

@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{route('apoderadoInicio',['dniApoderado' => $dniApoderado])}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{route('notasHijo',['codigoEstudiante' => $codigoEstudiante])}}" class="nav-link ">General</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('matriculaRenovacionHijo',['codigoEstudiante' => $codigoEstudiante])}}" class="nav-link ">Matricula</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>    
@endsection

@section('contenido')
<div class="hijo-dashboard">
    <!-- Cabecera -->
    <div class="hijo-header">
        <h1>Hola, Juan Chávez</h1>
        <p>Información del estudiante <strong>{{$hijo->apellido_paterno }} {{$hijo->apellido_materno}}, {{$hijo->primer_nombre}}</strong></p>
    </div>

    <!-- Contenedor de información -->
    <div class="info-container">
        <!-- Información del estudiante -->
        <div class="card">
            <h3>Información Básica</h3>
            <p><strong>Grado:</strong>{{$hijo->matricula->first()->seccion->grado->grado}}</p>
            <p><strong>Sección:</strong>{{$hijo->matricula->first()->seccion->seccion}}</p>
            <p><strong>Nivel:</strong>{{$hijo->matricula->first()->seccion->grado->nivel->nivel}}</p>
            <p><strong>Ciclo Actual:</strong>{{date('Y',strtotime($hijo->matricula->first()->periodo->inicioPeriodo))}}</p>
        </div>

        <!-- Estado académico -->
        <div class="card">
            <h3>Estado Académico</h3>
            <p><strong>Promedio General:</strong> 15.6</p>
            <p><strong>Última Nota:</strong> Matemática: 18</p>
            <p><strong>Matrícula:</strong> Activa</p>
        </div>
    </div>

    <!-- Botones de acción -->
    <div class="action-buttons">
        <a href="#">Ver Notas</a>
        <a href="#">Ver Matrícula</a>
    </div>

    
    <div class="reporteNotas">
        <h4>REPORTE NOTAS</h4>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Cursos</th>
                    <th scope="col">Bimestre 1</th>
                    <th scope="col">Bimestre 2</th>
                    <th scope="col">Bimestre 3</th>
                    <th scope="col">Promedio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ded</td>
                    <td>rfr</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="graficos">
        <canvas id="promedioHistorico"></canvas>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script>
        const labels = ['2023','2024','2025','2026']
        const graph = document.querySelector("#promedioHistorico");
        const data = {
            labels: labels,
            datasets:[{
                label:"Promedio histórico",
                data: [4, 5, 13, 7],
                backgroundColor: '#B6CFB6'
            }]
        };
        const config={
            type:'bar',
            data:data,
        };
        new Chart(graph,config)
    </script>
@endsection

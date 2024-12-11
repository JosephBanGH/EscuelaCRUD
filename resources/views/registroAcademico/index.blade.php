@extends('prueba')

@section('styles')
    <style>
        .overview{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap:1em;
            text-align: center;
        }

        .overview .resumen{
            padding: 2em;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.307);
            border-radius: .5em;
        }

        .overview .accionRapida{
            border-radius: .5em;
            padding: 2em;
            background: rgba(51, 41, 192, 0.8);
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.307);
            font-style:none;
            color: white;
            cursor: pointer;
        }

    </style>
@endsection

@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{route('registroAcademico.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item ">
                <a class="nav-link" data-bs-toggle="collapse" href="#preinscripciones" role="button" aria-expanded="false" aria-controls="preinscripciones">
                    <i class="link-icon" data-feather="file-plus"></i>
                    <span class="link-title">PREINSCRIPCIONES</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="preinscripciones">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{route('addPreinscripciones')}}" class="nav-link ">Registrar Preinscripciones</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{route('evaluarPreinscripciones')}}" class="nav-link ">Evaluar Preinscripciones</a>
                    </li>
                </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-bs-toggle="collapse" href="#matriculas" role="button" aria-expanded="false" aria-controls="matriculas">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">MATRICULAS</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="matriculas">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('buscarMatricula')}}" class="nav-link ">Editar Matricula</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div> 
@endsection

@section('contenido')
    <div class="overview">
        <div class="resumen" ><span>Preinscripciones Ingresadas: </span></div>
        <div class="resumen" ><span>Preinscripciones Evaluadas: </span></div>
        <div class="resumen" ><span>Preinscripciones Pendientes: </span></div>
        <div class="resumen" ><span>Alertas: </span></div>

        <a class="accionRapida">Registrar Preinscripcion</a>
        <a class="accionRapida">Evaluar Estudiante</a>
        <a class="accionRapida">Editar Matricula</a>
        <a class="accionRapida">Generar Reportes</a>
    </div>
    <div class="actividadesReciente mt-5">
        <h4 class="text-secondary">Actividades Recientes</h4>
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col" class="table-primary">ID</th>
                    <th scope="col" class="table-primary">APODERADO</th>
                    <th scope="col" class="table-primary">FECHA</th>
                    <th scope="col" class="table-primary">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>123</td>
                    <td>APODERADO</td>
                    <td>FECHA</td>
                    <td>Estado</td>
                </tr>
            </tbody>
        </table>
        
        <div class="mt-5">
            <h4 class="text-secondary">Gráfico de Desempeño</h4>
            <canvas id="desempeño"></canvas>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script>
        const labels = ['Enero', 'Febrero', 'Marzo', 'Abril']

        const graph = document.querySelector("#desempeño");

        const data = {
            labels: labels,
            datasets: [{
                label:"Ejemplo 1",
                data: [1, 2, 3, 4],
                backgroundColor: 'rgba(9, 129, 176, 0.2)'
            }]
        };

        const config = {
            type: 'bar',
            data: data,
        };

        new Chart(graph, config);
    </script>
@endsection




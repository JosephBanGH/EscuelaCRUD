<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    th, td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }
    
    th {
        background-color: #f2f2f2;
    }
    
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .header {
        font-size: 20px;
        text-align: center;
        margin-bottom: 20px;
    }

    .footer {
        margin-top: 20px;
        text-align: center;
        font-size: 12px;
        color: #777;
    }
</style>

<!-- Default box -->
<div class="container mt-4">
    <h3 class="mb-4">Listado de Matriculas</h3>

    <div class="d-flex justify-content-between mb-4">
        <a href="{{route('matricula.create')}}" class="btn btn-danger"><i class="fas fa-faplus"></i> MATRICULAR</a>
    </div>
    
    <table id="table" class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">nroMatricula</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Grado a matricular</th>
            <th scope="col">Fecha</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
            @if ($matricula->isEmpty())
                <div class="alert alert-info mt-3" role="alert">
                    No hay resultados para la búsqueda.
                </div>
            @else
                @foreach($matricula as $itemmatricula)
                <tr>
                    <td>{{$itemmatricula->numero_matricula}}</td>
                    <td>{{$itemmatricula->alumno->apellido_paterno}}</td>
                    <td>{{$itemmatricula->alumno->apellido_materno}}</td>
                    <td>{{$itemmatricula->grado->grado}} {{$itemmatricula->grado->seccion}}, {{$itemmatricula->grado->nivel}}</td>
                    <td>{{$itemmatricula->fecha}}</td>
                    <td>
                        <a href="{{ route('matricula.edit', $itemmatricula->numero_matricula) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-pencil-alt"></i> Editar
                        </a> 
                    </td>

                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

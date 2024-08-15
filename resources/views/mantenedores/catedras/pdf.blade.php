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
<div class="container">
    <h3> LISTADO DE CATEDRAS </h3>
    <br>
    <a href="{{ route('catedra.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo Registro
    </a> 


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Docente</th>
                <th scope="col">Grado</th>
                <th scope="col">Curso</th>
                <th scope="col">Periodo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catedra as $itemcatedra)
                <tr>
                    <td>{{ $itemcatedra->personal->nombres}}</td>
                    <td>
                        @foreach($itemcatedra->curso_grado as $cursoGrado)
                            {{ $cursoGrado->grado->grado }}, {{ $cursoGrado->grado->seccion }} <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($itemcatedra->curso_grado as $cursoGrado)
                            {{ $cursoGrado->curso->nombre_curso }} <br>
                        @endforeach
                    </td>
                    <td>{{ $itemcatedra->periodo }}</td>
                    <td>
                        {{-- <a href=" route('catedra.edit', $itemcatedra->idcatedra) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a> --}}
                        <a href="{{ route('catedra.confirmar', $itemcatedra->codigo_docente) }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
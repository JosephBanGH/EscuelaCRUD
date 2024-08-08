@extends('prueba')

@section('titulo')
    <title>NOTA</title>
@endsection

@section('contenido')
<div class="container mt-5">
    <h2>Tabla de Notas</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Alumno</th>
                <th>NOTA1</th>
                <th>NOTA2</th>
                <th>NOTA3</th>
                <th>NOTA4</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Alumno 1</td>
                <td contenteditable="true">A</td>
                <td contenteditable="true">C</td>
                <td contenteditable="true">A</td>
                <td contenteditable="true">B</td>
            </tr>
            <tr>
                <td>Alumno 2</td>
                <td contenteditable="true">B</td>
                <td contenteditable="true">C</td>
                <td contenteditable="true">C</td>
                <td contenteditable="true">A</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
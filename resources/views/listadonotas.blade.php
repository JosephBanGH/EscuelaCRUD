@extends('prueba')
@section('contenido')
    <style>
        .caja1 {
            background-color: rgba(0, 0, 0, 0.5);
            width: 15em;
            height: auto;
            position: relative;
            margin: auto;
            padding: 1em;
            border-radius: 0.5em;
            color: black;
        }
        .formtlo {
            font-size: 1.5em;
            font-weight: bold;
            padding-bottom: 0.5em;
            color: white;
        }
        .ub1 {
            text-align: left;
            font-weight: bold;
            color: white;
            margin: 0.2em 0;
        }
        input, select {
            width: 100%;
            padding: 0.3em;
            font-size: 0.8em;
            border-radius: 0.3em;
            border: 1px solid black;
            color: black;
            text-align: left;
            cursor: pointer;
            margin-bottom: 0.5em;
        }
        input::placeholder {
            color: #1E265D;
            font-weight: bold;
            opacity: 0.5;
        }
        input[type=submit], input[type=reset] {
            margin-top: 1em;
            width: 48%;
            text-align: center;
            background-color: #1958AD;
            color: white;
            cursor: pointer;
        }
        input[type=checkbox] {
            margin-left: 0;
            width: 10%;
            cursor: pointer;
        }
        .ref1 {
            margin-top: 1em;
            color: orange;
        }
        a {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
    </style>   
    <div class="caja1">
        <form method="post" action="login.php">
            <div class="formtlo">Registro de Notas</div>
            <div class="ub1">Nivel</div>
            <select name="rol">
                <option value="0" style="display:none;">Seleccionar</option>
                <option value="Initial">Inicial</option>
                <option value="Primary">Primaria</option>
                <option value="Secundary">Secundaria</option>
            </select>
            <div class="ub1">Grado</div>
            <select name="rol">
                <option value="0" style="display:none;">Seleccionar</option>
                <option value="First">Primero</option>
                <option value="Second">Segundo</option>
                <option value="Third">Tercero</option>
                <option value="Fourth">Cuarto</option>
                <option value="Fifth">Quinto</option>
                <option value="Sixth">Sexto</option>
            </select>
            <div class="ub1">Sección</div>
            <select name="rol">
                <option value="0" style="display:none;">Seleccionar</option>
                <option value="A">A</option>
                <option value="B">B</option>
            </select>
            <div class="ub1">&#128273;Curso:</div>
            <input type="text" name="txtcurso" placeholder="Ingresar curso...">
            <div class="ub1">&#128273; Profesor:</div>
            <input type="text" name="txtprofesor" placeholder="Ingresar profesor...">
            <div class="ub1">&#128273; Año escolar:</div>
            <input type="text" name="txtañoescolar" placeholder="Ingresar año escolar...">
            <div class="ub1">Resumen del Bimestre:</div>
            <select name="rol">
                <option value="0" style="display:none;">Seleccionar</option>
                <option value="1Bimestre">Del Primer</option>
                <option value="1a2Bimestre">Del Primer al Segundo</option>
                <option value="1a3Bimestre">Del Primer al Tercero</option>
                <option value="Todos">Todos</option>
            </select>
            <div class="ub1">Imprimir en:</div>
            <select name="rol">
                <option value="0" style="display:none;">Seleccionar</option>
                <option value="1Bimestre">En Blanco</option>
                <option value="Notas">Solo Notas de Alumnos</option>
                <option value="NotasyLetras">Notas y Letras de Alumnos</option>
            </select>
            <div align="center">
                <input type="submit" value="Aceptar">
                <input type="reset" value="Cancelar">
            </div>
        </form>
    </div>
@endsection

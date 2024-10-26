@extends('prueba')

@section('contenido')

    <h1>HOLA</h1>

    <div class="cont">
        <h1>Bienvenido, {{ $apoderado->primer_nombre }} {{ $apoderado->apellido_paterno }}</h1>
    
        <h2>Tus hijos</h2>
        <ul>
            @foreach($estudiantes as $estudiante)
                <li>{{ $estudiante->primer_nombre }} {{ $estudiante->apellido_paterno }} - DNI: {{ $estudiante->dni }}</li>
            @endforeach
        </ul>
    </div>
@endsection
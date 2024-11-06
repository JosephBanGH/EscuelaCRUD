@extends('prueba')

@section('contenido')
    <h1>HOLA</h1>

    <div class="cont">
        <h1>Bienvenido, {{ $apoderado->primer_nombre }} {{ $apoderado->apellido_paterno }}</h1>
    
        <h2>Tus hijos</h2>
        
        <div class="container">
            <div class="d-flex flex-column flex-md-row">
                @foreach($estudiantes as $estudiante)
                    <a href="{{ route('notasHijo',['codigoEstudiante' => $estudiante->codigoEstudiante]) }}" class="d-flex flex-column align-items-center bg-dark text-white rounded shadow ms-0 ms-md-2 mb-3 mb-md-0" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $estudiante->urlImagen) }}" alt="Foto de {{ $estudiante->primer_nombre }}" class="img-fluid rounded-top" style="height: 24rem; object-fit: cover;">
                        <div class="p-3" style="height: 6rem;">
                            <p class="mb-0">{{ $estudiante->primer_nombre }} {{ $estudiante->apellido_paterno }} - DNI: {{ $estudiante->dni }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        
    </div>
@endsection
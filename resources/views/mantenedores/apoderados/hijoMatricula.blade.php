@extends('prueba')
@section('contenido')
    <h1>MATRICULAS HIJO</h1>
    <div class="matriContainer">
        <h1>Matrícula del Estudiante: {{ $estudiante->primer_nombre }} {{ $estudiante->apellido_paterno }}</h1>
    
        @if($matricula)
            <h2>Periodo Activo: {{ $matricula->periodo->inicioPeriodo }} - {{ $matricula->periodo->finPeriodo }}</h2>
            <p><strong>Grado:</strong> {{ $matricula->seccion->grado->grado }}</p>
            <p><strong>Nivel:</strong> {{ $matricula->seccion->grado->nivel->nivel }}</p>
            <p><strong>Sección:</strong> {{ $matricula->seccion->seccion }}</p>
            <p><strong>Escala:</strong> {{ $estudiante->escala->escala }}</p>
        @else
            <p>El estudiante no está matriculado en el período activo.</p>
        @endif
    </div>

    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('matricula.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">DNI Apoderado</label>
                <input type="text" id="dniApoderado" name="dniApoderado" class="form-control" value="{{ $matricula->alumno->apoderados->first()->dniApoderado }}" readonly>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">DNI Estudiante</label>
                <input type="text" class="form-control" value="{{ $estudiante->dni }}" disabled>
                <input type="hidden" id="codigoEstudiante" name="codigoEstudiante" class="form-control" value="{{ $estudiante->codigoEstudiante }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Numero Operacion</label>
                <input type="text" id="numeroOperacion" name="numeroOperacion" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Concepto de Pago</label>
                <input type="text" id="conceptoPago" name="conceptoPago" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Monto</label>
                <input type="text" id="monto" name="monto" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fecha Pago</label>
                <input type="date" id="fechaPago" name="fechaPago" class="form-control">
            </div>
            <div class="mb-3">
                <label for="archivo" class="form-label">Subir Comprobante de Pago (PDF o Imagen)</label>
                <input type="file" class="form-control" id="archivo" name="archivo" accept=".pdf,image/*" required>
                {{-- accept=".pdf,image/*" permite subir archivos PDF o cualquier tipo de imagen --}}
            </div>
        
            <button type="submit" class="btn btn-primary">Subir Archivo</button>
        </form>
        
    </div>
@endsection
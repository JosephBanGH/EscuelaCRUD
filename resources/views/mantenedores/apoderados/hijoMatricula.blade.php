@extends('prueba')
@section('styles')
    <style>
        .formRenovarMatricula{
            display: none;
            background-color: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 70px;
        }

        .formularioRenovarMatricula{
            background-color: rgb(102, 179, 226);
            margin: 20px;
            padding-top: 15px;
            padding-inline: 20px;
            padding-bottom: 10px;
            max-width: 1025px;
        }
        
    </style>
@endsection
@section('contenido')
    <h1>MATRICULA</h1>
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
    <div class="matriContainer">
        @if($matricula)
            <div class="card border-info mb-3" id="themePossibility">
                <div class="card-header"><h5>Matricula del Estudiante {{ $estudiante->primer_nombre }} {{ $estudiante->apellido_paterno }} {{ $estudiante->apellido_materno }}</h5></div>
                <div class="card-body text-secondary">
                    <div class="form-group">
                        <label for="inicioPeriodo">Fecha Inicio:</label>
                        <input id="inicioPeriodo" class="form-control" type="text" value="{{ $matricula->periodo->inicioPeriodo }}" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="finPeriodo">Fecha Fin:</label>
                        <input id="finPeriodo" class="form-control" type="text" value="{{ $matricula->periodo->finPeriodo }}" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="nivelGradoSeccion">Nivel - Grado - Seccion</label>
                        <input id="nivelGradoSeccion" class="form-control" type="text" value="{{ $matricula->seccion->grado->nivel->nivel }} - {{ $matricula->seccion->grado->grado }} - {{ $matricula->seccion->seccion }}" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="escala">Escala</label>
                        <input id="escala" class="form-control" type="text" value="{{ $estudiante->escala->escala }}" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="montoPension">Monto Pensión Segun Escala</label>
                        <input id="montoPension" class="form-control" type="text" value="{{ $estudiante->escala->montoPago }}" readonly>
                    </div>
                    <br>
                    @if($renovar)
                        <button type="button" class="btn btn-primary abrirFormRenovarMatricula">RENOVAR MATRICULA</button>
                    @else
                        <p class="text-danger">Estimado usuario el nuevo periodo ha iniciado, sin embargo 
                            no puede acceder a la renovación mientras no cancele su deuda del periodo anterior</p>
                    @endif
                    
                </div>
            </div>
        @else
            <p class="text-danger">El estudiante no está matriculado en el período activo.</p>
        @endif
    </div>

    <div class="formRenovarMatricula">
        <form class="formularioRenovarMatricula" action="{{ route('comprobante.store') }}" method="POST" enctype="multipart/form-data">
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
@section('scripts')
    <script>
        const formRenovarMatricula = document.querySelector('.formRenovarMatricula')
        const abrirFormRenovarMatricula = document.querySelector('.abrirFormRenovarMatricula')
        abrirFormRenovarMatricula.addEventListener('click',(e)=>{
            formRenovarMatricula.style.display = 'block';
        })
    </script>
@endsection
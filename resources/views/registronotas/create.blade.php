@extends('prueba')

@section('contenido')
    <div class="container">
        <h1>Crear Nuevo Registro de Notas</h1>

        <form action="{{ route('registronotas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_curso">Curso</label>
                <select class="form-control" id="id_curso" name="id_curso">
                    @foreach($catedras as $catedra)
                        <option value="{{ $catedra->id_curso }}">{{ $catedra->id_curso }}</option>
                    @endforeach
                </select>
            </div>          
            <div class="form-group">
                <label for="id_grado">Grado</label>
                <select class="form-control" id="id_grado" name="id_grado">
                    @foreach($catedras as $catedra)
                        <option value="{{ $catedra->id_grado }}">{{ $catedra->id_grado }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="codigo_docente">Código del Docente</label>
                <select class="form-control" id="codigo_docente" name="codigo_docente">
                    @foreach($catedras as $catedra)
                        <option value="{{ $catedra->codigo_docente }}">{{ $catedra->codigo_docente }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Registro</button>
        </form>
    </div>
@endsection

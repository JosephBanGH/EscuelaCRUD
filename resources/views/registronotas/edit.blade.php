@extends('prueba')
@section('contenido')
<form action="{{ route('registronotas.update', $registroNota->id_registronotas) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="id_curso">Curso</label>
        <select class="form-control" id="id_curso" name="id_curso">
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}" {{ $curso->id_curso == $registroNota->id_curso ? 'selected' : '' }}>
                    {{ $curso->nombre_curso }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="id_grado">Grado</label>
        <select class="form-control" id="id_grado" name="id_grado">
            @foreach($grados as $grado)
                <option value="{{ $grado->id }}" {{ $grado->id_grado == $registroNota->id_grado ? 'selected' : '' }}>
                    {{ $grado->grado }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="codigo_docente">Código del Docente</label>
        <select class="form-control" id="codigo_docente" name="codigo_docente">
            @foreach($docentes as $docente)
                <option value="{{ $docente->codigo }}" {{ $docente->codigo_docente == $registroNota->codigo_docente ? 'selected' : '' }}>
                    {{ $docente->nombres }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $registroNota->fecha}}" required>
    </div>

    <div class="form-group">
        <label for="notas">Notas de los Alumnos</label>
        @foreach($estudiantes as $estudiante)
            @php
                $detalleNota = $registroNota->detalleNotas->firstWhere('codigo_estudiante', $estudiante->codigo_estudiante);
                $nota = $detalleNota ? $detalleNota->nota : '';
            @endphp
            <div class="row mb-2">
                <div class="col">
                    {{ $estudiante->nombres }}
                    <input type="hidden" name="notas[{{ $loop->index }}][codigo_estudiante]" value="{{ $estudiante->codigo }}">
                </div>
                <div class="col">
                    <input type="number" name="notas[{{ $loop->index }}][nota]" class="form-control" min="0" max="100" value="{{ old('notas.' . $loop->index . '.nota', $nota) }}" required>
                </div>
            </div>
        @endforeach
    </div> 

    <button type="submit" class="btn btn-primary">Actualizar Registro</button>
</form>
@endsection
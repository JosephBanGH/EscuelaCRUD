@extends('prueba')

@section('titulo')
    <title>Editar Curso por Grado</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Editar Curso por Grado</h3>

        <form action="{{ route('curso_grado.update', $cursoGrado->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_curso">Curso</label>
                <select name="id_curso" id="id_curso" class="form-control">
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id_curso }}" {{ $curso->id_curso == $cursoGrado->id_curso ? 'selected' : '' }}>
                            {{ $curso->nombre_curso }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_grado">Grado</label>
                <select name="id_grado" id="id_grado" class="form-control">
                    @foreach($grados as $grado)
                        <option value="{{ $grado->id_grado }}" {{ $grado->id_grado == $cursoGrado->id_grado ? 'selected' : '' }}>
                            {{ $grado->grado }} - {{ $grado->seccion }} ({{ $grado->nivel }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="periodo_escolar">Periodo Escolar</label>
                <input type="text" name="periodo_escolar" id="periodo_escolar" class="form-control" value="{{ $cursoGrado->periodo_escolar }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('curso_grado.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

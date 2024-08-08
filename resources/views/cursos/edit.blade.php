@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Editar Curso</h1>
        <form method="POST" action="{{ route('curso.update', $curso->id_curso) }}">
            @method('PUT')
            @csrf

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="nombre_curso">Nombre del Curso</label>
                    <input type="text" class="form-control @error('nombre_curso') is-invalid @enderror" id="nombre_curso" name="nombre_curso" value="{{ old('nombre_curso', $curso->nombre_curso) }}">
                    @error('nombre_curso')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            @if ($errors->has('duplicado'))
                <div class="alert alert-danger mt-3">
                    {{ $errors->first('duplicado') }}
                </div>
            @endif

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
            <a href="{{ route('curso.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection

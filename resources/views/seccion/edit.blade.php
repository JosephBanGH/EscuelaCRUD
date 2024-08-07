@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Editar Sección</h1>
        <form method="POST" action="{{ route('seccion.update', $seccion->id_seccion) }}">
            @method('PUT')
            @csrf

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="nombre_seccion">Nombre de la Sección</label>
                    <input type="text" class="form-control @error('nombre_seccion') is-invalid @enderror" id="nombre_seccion" name="nombre_seccion" value="{{ old('nombre_seccion', $seccion->nombre_seccion) }}">
                    @error('nombre_seccion')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
            <a href="{{ route('seccion.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection

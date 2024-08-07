@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Nuevo Grado</h1>
        <form method="POST" action="{{ route('grado.store') }}">
            @csrf

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="nombre_grado">Nombre del Grado</label>
                    <input type="text" class="form-control @error('nombre_grado') is-invalid @enderror" id="nombre_grado" name="nombre_grado" value="{{ old('nombre_grado') }}">
                    @error('nombre_grado')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('grado.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection

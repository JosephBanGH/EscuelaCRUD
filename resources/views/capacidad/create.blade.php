@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Nueva Capacidad</h1>
        <form method="POST" action="{{ route('capacidad.store') }}">
            @csrf

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="descripcion_capacidad">Descripcion de la capacidad</label>
                    <input type="text" class="form-control @error('descripcion_capacidad') is-invalid @enderror" id="descripcion_capacidad" name="descripcion_capacidad" value="{{ old('descripcion_capacidad') }}">
                    @error('descripcion_capacidad')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('capacidad.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection
@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Editar Registro</h1>
        <form method="POST" action="{{ route('alumno.store') }}">
            @csrf

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="primer_nombre">Primer Nombre</label>
                    <input type="text" autocomplete="off" class="form-control @error('primer_nombre') is-invalid @enderror" maxlength="8" id="primer_nombre" name="primer_nombre" value="{{ old('primer_nombre') }}">
                    @error('primer_nombre')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="otros_nombres">Otros Nombres</label>
                    <input type="text" autocomplete="off" class="form-control @error('otros_nombres') is-invalid @enderror" maxlength="40" id="otros_nombres" name="otros_nombres" value="{{ old('otros_nombres') }}">
                    @error('otros_nombres')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="apellido_paterno">Apellido Paterno</label>
                    <input type="text" autocomplete="off" class="form-control @error('apellido_paterno') is-invalid @enderror" maxlength="40" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}">
                    @error('apellido_paterno')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="apellido_materno">Apellido Materno</label>
                    <input type="text" autocomplete="off" class="form-control @error('apellido_materno') is-invalid @enderror" maxlength="100" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}">
                    @error('apellido_materno')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('alumno.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection

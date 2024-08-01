@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Editar Registro</h1>
        <form method="POST" action="{{ route('personal.update', $alumno->codigo_alumno) }}">
            @method('PUT')
            @csrf

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="codigo_docente">Código Estudiante</label>
                    <input type="text" class="form-control" id="codigo_estudiante" name="codigo_estudiante" value="{{ $estudiante->codigo_estudiante}}" disabled>
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="Pnombre">Primer Nombre</label>
                    <input type="text" autocomplete="off" class="form-control @error('Pnombre') is-invalid @enderror" maxlength="8" id="Pnombre" name="Pnombre" value="{{ old('Pnombre', $alumno->Pnombre) }}">
                    @error('Pnombre')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="Onombre">Otros Nombres</label>
                    <input type="text" autocomplete="off" class="form-control @error('Onombres') is-invalid @enderror" maxlength="40" id="Onombres" name="Onombres" value="{{ old('Onombres', $alumno->otros_nombres) }}">
                    @error('Onombres')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="apellidoP">Apellido Paterno</label>
                    <input type="text" autocomplete="off" class="form-control @error('apellidoP') is-invalid @enderror" maxlength="40" id="apellidoP" name="apellidoP" value="{{ old('apellidoP', $alumno->apellido_paterno) }}">
                    @error('apellidoP')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="apellidoM">Apellido Materno</label>
                    <input type="text" autocomplete="off" class="form-control @error('apellidoM') is-invalid @enderror" maxlength="100" id="apellidoM" name="apellidoM" value="{{ old('apellidoM', $alumno->apellido_materno) }}">
                    @error('apellidoM')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('alumno.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection

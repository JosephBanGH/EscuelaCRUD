@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Editar Registro</h1>
        <form method="POST" action="{{ route('personal.update', $personal->codigo_docente) }}">
            @method('PUT')
            @csrf

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="codigo_docente">Código Docente</label>
                    <input type="text" class="form-control" id="codigo_docente" name="codigo_docente" value="{{ $personal->codigo_docente }}" disabled>
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="DNI">DNI</label>
                    <input type="text" autocomplete="off" class="form-control @error('DNI') is-invalid @enderror" maxlength="8" id="DNI" name="DNI" value="{{ old('DNI', $personal->DNI) }}">
                    @error('DNI')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="nombres">Nombres</label>
                    <input type="text" autocomplete="off" class="form-control @error('nombres') is-invalid @enderror" maxlength="40" id="nombres" name="nombres" value="{{ old('nombres', $personal->nombres) }}">
                    @error('nombres')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" autocomplete="off" class="form-control @error('apellidos') is-invalid @enderror" maxlength="40" id="apellidos" name="apellidos" value="{{ old('apellidos', $personal->apellidos) }}">
                    @error('apellidos')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="direccion">Dirección</label>
                    <input type="text" autocomplete="off" class="form-control @error('direccion') is-invalid @enderror" maxlength="100" id="direccion" name="direccion" value="{{ old('direccion', $personal->direccion) }}">
                    @error('direccion')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="estado_civil">Estado Civil</label>
                    <select class="form-control @error('estado_civil') is-invalid @enderror" id="estado_civil" name="estado_civil">
                        <option value="">Seleccione</option>
                        <option value="soltero" {{ old('estado_civil', $personal->estado_civil) == 'soltero' ? 'selected' : '' }}>Soltero</option>
                        <option value="casado" {{ old('estado_civil', $personal->estado_civil) == 'casado' ? 'selected' : '' }}>Casado</option>
                        <option value="viudo" {{ old('estado_civil', $personal->estado_civil) == 'viudo' ? 'selected' : '' }}>Viudo</option>
                        <option value="divorciado" {{ old('estado_civil', $personal->estado_civil) == 'divorciado' ? 'selected' : '' }}>Divorciado</option>
                    </select>
                    @error('estado_civil')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="telefono">Teléfono</label>
                    <input type="text" autocomplete="off" class="form-control @error('telefono') is-invalid @enderror" maxlength="9" id="telefono" name="telefono" value="{{ old('telefono', $personal->telefono) }}">
                    @error('telefono')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="seguro_social">Seguro Social</label>
                    <input type="text" autocomplete="off" class="form-control @error('seguro_social') is-invalid @enderror" maxlength="20" id="seguro_social" name="seguro_social" value="{{ old('seguro_social', $personal->seguro_social) }}">
                    @error('seguro_social')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="departamento">Departamento</label>
                    <input type="text" autocomplete="off" class="form-control @error('departamento') is-invalid @enderror" maxlength="40" id="departamento" name="departamento" value="{{ old('departamento', $personal->departamento) }}">
                    @error('departamento')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="fecha_registro">Fecha de Ingreso</label>
                    <input type="date" class="form-control @error('fecha_registro') is-invalid @enderror" id="fecha_registro" name="fecha_registro" value="{{ old('fecha_registro', $personal->fecha_registro) }}">
                    @error('fecha_registro')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
            <a href="{{ route('personal.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection

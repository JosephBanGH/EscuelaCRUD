@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Editar Registro</h1>
        <form method="POST" action="{{ route("producto.update",$producto->codigo_docente)}}">
        @method('put')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="">Código docente</label>
            <input type="text" class="form-control" id="codigo_docente" name="codigo_docente" placeholder="Codigo" value="{{ $producto->codigo_docente}}" disabled>
            </div>
        </div>
        <div class="form-group col-md-12">
    <label for="">DNI</label>
    <input type="text" autocomplete="off" class="form-control @error('DNI') is-invalid @enderror" maxlength="8" id="DNI" name="DNI" value="{{ old('DNI', $producto->DNI) }}">
    @error('DNI')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Nombres</label>
        <input type="text" autocomplete="off" class="form-control @error('nombres') is-invalid @enderror" maxlength="40" id="nombres" name="nombres" value="{{ old('nombres', $producto->nombres) }}">
        @error('nombres')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Apellidos</label>
        <input type="text" autocomplete="off" class="form-control @error('apellidos') is-invalid @enderror" maxlength="40" id="apellidos" name="apellidos" value="{{ old('apellidos', $producto->apellidos) }}">
        @error('apellidos')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Dirección</label>
        <input type="text" autocomplete="off" class="form-control @error('direccion') is-invalid @enderror" maxlength="100" id="direccion" name="direccion" value="{{ old('direccion', $producto->direccion) }}">
        @error('direccion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Estado Civil</label>
        <select class="form-control @error('estado_civil') is-invalid @enderror" id="estado_civil" name="estado_civil">
            <option value="">Seleccione</option>
            <option value="soltero" {{ old('estado_civil', $producto->estado_civil) == 'soltero' ? 'selected' : '' }}>Soltero</option>
            <option value="casado" {{ old('estado_civil', $producto->estado_civil) == 'casado' ? 'selected' : '' }}>Casado</option>
            <option value="viudo" {{ old('estado_civil', $producto->estado_civil) == 'viudo' ? 'selected' : '' }}>Viudo</option>
            <option value="divorciado" {{ old('estado_civil', $producto->estado_civil) == 'divorciado' ? 'selected' : '' }}>Divorciado</option>
        </select>
        @error('estado_civil')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Teléfono</label>
        <input type="text" autocomplete="off" class="form-control @error('telefono') is-invalid @enderror" maxlength="9" id="telefono" name="telefono" value="{{ old('telefono', $producto->telefono) }}">
        @error('telefono')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Seguro Social</label>
        <input type="text" autocomplete="off" class="form-control @error('seguro_social') is-invalid @enderror" maxlength="20" id="seguro_social" name="seguro_social" value="{{ old('seguro_social', $producto->seguro_social) }}">
        @error('seguro_social')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Departamento</label>
        <input type="text" autocomplete="off" class="form-control @error('departamento') is-invalid @enderror" maxlength="40" id="departamento" name="departamento" value="{{ old('departamento', $producto->departamento) }}">
        @error('departamento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Fecha de Ingreso</label>
        <input type="date" class="form-control @error('fecha_registro') is-invalid @enderror" id="fecha_registro" name="fecha_registro">
        @error('fecha_registro')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

            <button type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
            <a href="{{ route('cancelar')}}" class="btn btndanger"><i class="fas fa-ban"></i> Cancelar</button></a>
        </form>
    </div>
@endsection
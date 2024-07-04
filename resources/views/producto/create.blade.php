@extends('prueba')
@section('contenido')
    <div class="container">
        <h1>Registro Nuevo</h1>
        <form method="POST" action="">
        @csrf
        <div class="form-row">
    <div class="form-group col-md-6">
        <label for="DNI">DNI</label>
        <input type="text" class="form-control @error('DNI') is-invalid @enderror" maxlength="9" id="DNI" name="DNI">
        @error('DNI')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nombres">Nombres</label>
        <input type="text" class="form-control @error('nombres') is-invalid @enderror" maxlength="40" id="nombres" name="nombres">
        @error('nombres')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control @error('apellidos') is-invalid @enderror" maxlength="40" id="apellidos" name="apellidos">
        @error('apellidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control @error('direccion') is-invalid @enderror" maxlength="100" id="direccion" name="direccion">
        @error('direccion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="estado_civil">Estado Civil</label>
        <select class="form-control @error('estado_civil') is-invalid @enderror" id="estado_civil" name="estado_civil">
            <option value="">Seleccione</option>
            <option value="soltero">Soltero</option>
            <option value="casado">Casado</option>
            <option value="viudo">Viudo</option>
            <option value="divorciado">Divorciado</option>
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
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control @error('telefono') is-invalid @enderror" maxlength="9" id="telefono" name="telefono">
        @error('telefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="seguro_social">Seguro Social</label>
            <input type="text" class="form-control @error('seguro_social') is-invalid @enderror" maxlength="20" id="seguro_social" name="seguro_social">
            @error('seguro_social')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="departamento">Departamento</label>
            <input type="text" class="form-control @error('departamento') is-invalid @enderror" maxlength="40" id="departamento"    name="departamento">
            @error('departamento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="fecha_registro">Fecha de Ingreso</label>
            <input type="date" class="form-control @error('fecha_registro') is-invalid @enderror" id="fecha_registro" name="fecha_registro">
            @error('fecha_registro')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
        <button type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
        <a href="" class="btn btndanger"><i class="fas fa-ban"></i> Cancelar</button></a>
        </form>
    </div>
@endsection
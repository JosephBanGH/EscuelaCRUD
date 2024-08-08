@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Registro Nueva Capacidad</h1>
        <form method="POST" action="{{ route('capacidad.store') }}">
            @csrf
            
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="descripcion">Descripcion de la capacidad</label>
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
                    @error('descripcion')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div> 
            
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="abreviatura">Abreviatura de la capacidad</label>
                    <input type="text" class="form-control @error('abreviatura') is-invalid @enderror" id="abreviatura" name="abreviatura" value="{{ old('abreviatura') }}">
                    @error('abreviatura')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="id_curso">ID del curso</label>
                    <input type="text" class="form-control @error('id_curso') is-invalid @enderror" id="id_curso" name="id_curso" value="{{ old('id_curso') }}">
                    @error('id_curso')
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
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('capacidad.index') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection
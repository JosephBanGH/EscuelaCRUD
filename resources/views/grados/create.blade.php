@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Registro Nuevo Grado</h1>
        <form method="POST" action="{{ route('grado.store') }}">
            @csrf
            
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="nivel_grado">Nivel</label>
                    <select class="form-control @error('nivel_grado') is-invalid @enderror" id="nivel_grado" name="nivel_grado">
                        <option value="">Seleccione</option>
                        <option value="inicial" {{ old('nivel_grado') == 'inicial' ? 'selected' : '' }}>Inicial</option>
                        <option value="primaria" {{ old('nivel_grado') == 'primaria' ? 'selected' : '' }}>Primaria</option>
                        <option value="secundaria" {{ old('nivel_grado') == 'secundaria' ? 'selected' : '' }}>Secundaria</option>
                    </select>
                    @error('nivel_grado')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            
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
            
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="seccion_id">Sección</label>
                    <select class="form-control @error('seccion_id') is-invalid @enderror" id="seccion_id" name="seccion_id">
                        <option value="">Seleccione</option>
                        @foreach($secciones as $seccion)
                            <option value="{{ $seccion->id_seccion }}" {{ old('seccion_id') == $seccion->id_seccion ? 'selected' : '' }}>{{ $seccion->nombre_seccion }}</option>
                        @endforeach
                    </select>
                    @error('seccion_id')
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

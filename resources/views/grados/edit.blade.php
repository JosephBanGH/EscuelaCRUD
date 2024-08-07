@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Editar Grado</h1>
        <form method="POST" action="{{ route('grado.update', $grado->id_grado) }}">
            @method('PUT')
            @csrf

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="nivel_grado">Nivel</label>
                    <select class="form-control @error('nivel_grado') is-invalid @enderror" id="nivel_grado" name="nivel_grado">
                        <option value="">Seleccione</option>
                        <option value="inicial" {{ old('nivel_grado', $grado->nivel_grado) == 'inicial' ? 'selected' : '' }}>Inicial</option>
                        <option value="primaria" {{ old('nivel_grado', $grado->nivel_grado) == 'primaria' ? 'selected' : '' }}>Primaria</option>
                        <option value="secundaria" {{ old('nivel_grado', $grado->nivel_grado) == 'secundaria' ? 'selected' : '' }}>Secundaria</option>
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
                    <input type="text" class="form-control @error('nombre_grado') is-invalid @enderror" id="nombre_grado" name="nombre_grado" value="{{ old('nombre_grado', $grado->nombre_grado) }}">
                    @error('nombre_grado')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="seccion">Sección</label>
                    <select class="form-control @error('seccion') is-invalid @enderror" id="seccion" name="seccion">
                        <option value="">Seleccione</option>
                        <option value="A" {{ old('seccion', $grado->seccion) == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('seccion', $grado->seccion) == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ old('seccion', $grado->seccion) == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ old('seccion', $grado->seccion) == 'D' ? 'selected' : '' }}>D</option>
                        <option value="E" {{ old('seccion', $grado->seccion) == 'E' ? 'selected' : '' }}>E</option>
                    </select>
                    @error('seccion')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
            <a href="{{ route('grado.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection

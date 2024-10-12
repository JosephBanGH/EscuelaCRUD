@extends('prueba')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Editar Matricula</h1>
        <form method="POST" action="{{ route('matricula.update', $matricula->numMatricula) }}">
            @method('PUT')
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Código de estudiante (solo lectura) -->
            <div class="form-group">
                <label for="codigoEstudiante">Código Estudiante</label>
                <input type="text" class="form-control" name="codigoEstudiante" value="{{ $matricula->alumno->codigoEstudiante }}" readonly>
            </div>

            <!-- Apellido Paterno del estudiante -->
            <div class="form-group">
                <label for="apellidoPaterno">Apellido Paterno</label>
                <input type="text" class="form-control" name="apellidoPaterno" value="{{ $matricula->alumno->apellido_paterno }}" required>
            </div>

            <!-- Apellido Materno del estudiante -->
            <div class="form-group">
                <label for="apellidoMaterno">Apellido Materno</label>
                <input type="text" class="form-control" name="apellidoMaterno" value="{{ $matricula->alumno->apellido_materno }}" required>
            </div>

            <!-- Nivel (select) -->
            <div class="form-group">
                <label for="nivel">Nivel</label>
                <select name="nivel" id="nivel" class="form-control">
                    @foreach($niveles as $nivel)
                        <option value="{{ $nivel->idNivel }}" {{ $matricula->seccion->grado->nivel->idNivel == $nivel->idNivel ? 'selected' : '' }}>
                            {{ $nivel->nivel }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Grado (select) -->
            <div class="form-group">
                <label for="grado">Grado</label>
                <select name="grado" id="grado" class="form-control" required>
                    <option value="{{ $matricula->seccion->grado->idGrado }}" selected>
                        {{ $matricula->seccion->grado->grado }}
                    </option>
                </select>
                @if ($errors->has('grado'))
                    <span class="text-danger">{{ $errors->first('grado') }}</span>
                @endif
            </div>

            <!-- Sección (select) -->
            <div class="form-group">
                <label for="seccion">Sección</label>
                <select name="seccion" id="seccion" class="form-control" required>
                    <option value="{{ $matricula->seccion->idSeccion }}" selected>
                        {{ $matricula->seccion->seccion }}
                    </option>
                </select>
                @if ($errors->has('seccion'))
                    <span class="text-danger">{{ $errors->first('seccion') }}</span>
                @endif
            </div>

            @if ($errors->has('combinacion'))
                <div class="alert alert-danger">
                    {{ $errors->first('combinacion') }}
                </div>
            @endif
            
            <!-- Escala (solo lectura) -->
            <div class="form-group">
                <label for="escala">Escala</label>
                <input type="text" class="form-control" name="escala" value="{{ $matricula->alumno->escala->escala }}" readonly>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('matricula.index') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@endsection


@section('scripts')
    <script>
        // Función para cargar grados según el nivel seleccionado
        function cargarGrados(nivelId, selectedGrado = null) {
            $.ajax({
                url: '/get-grados/' + nivelId,
                method: 'GET',
                success: function(data) {
                    $('#grado').html(data.options);
                    if (selectedGrado) {
                        $('#grado').val(selectedGrado);
                    }
                    // Después de cargar los grados, cargar secciones para el grado seleccionado
                    cargarSecciones($('#grado').val(), '{{ $matricula->seccion->idSeccion }}');
                }
            });
        }

        // Función para cargar secciones según el grado seleccionado
        function cargarSecciones(gradoId, selectedSeccion = null) {
            $.ajax({
                url: '/get-secciones/' + gradoId,
                method: 'GET',
                success: function(data) {
                    $('#seccion').html(data.options);
                    if (selectedSeccion) {
                        $('#seccion').val(selectedSeccion);
                    }
                }
            });
        }

        // Cuando cambia el select de nivel
        $('#nivel').on('change', function() {
            var nivelId = $(this).val();
            cargarGrados(nivelId);
        });

        // Cuando cambia el select de grado
        $('#grado').on('change', function() {
            var gradoId = $(this).val();
            cargarSecciones(gradoId);
        });

        // Al cargar la página, cargar grados y secciones en base al valor actual
        $(document).ready(function() {
            var nivelId = $('#nivel').val();
            var selectedGrado = '{{ $matricula->seccion->grado->idGrado }}';
            var selectedSeccion = '{{ $matricula->seccion->idSeccion }}';

            // Cargar grados y secciones al inicio con los valores seleccionados
            cargarGrados(nivelId, selectedGrado);
        });
    </script>
@endsection


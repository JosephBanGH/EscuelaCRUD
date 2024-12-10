@extends('prueba')

@section('contenido')
    <h4 class="text-secondary mb-5 text-center">INFORMACION APODERADO</h4>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('storeApoderadoPreinscripcion') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombreApoderado" class="form-label">Nombre Apoderado</label>
            <input type="text" class="form-control @error('nombreApoderado') is-invalid @enderror" id="nombreApoderado" name="nombreApoderado" value="{{ old('nombreApoderado') }}">
            @error('nombreApoderado')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="apellidoApoderado" class="form-label">Apellido Apoderado</label>
            <input type="text" class="form-control @error('apellidoApoderado') is-invalid @enderror" id="apellidoApoderado" name="apellidoApoderado" value="{{ old('apellidoApoderado') }}">
            @error('apellidoApoderado')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni') }}">
            @error('dni')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="celular" class="form-label">Celular</label>
            <input type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" value="{{ old('celular') }}">
            @error('celular')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{ old('correo') }}">
            @error('correo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">GUARDAR</button>
    </form>

    <h4 class="text-secondary mt-5 mb-5 text-center">INFORMACION HIJO</h4>
    @if (session('successH'))
        <div class="alert alert-success">
            {{ session('successH') }}
        </div>
    @endif
    <form action="{{ route('storeInteresadoPreinscripcion') }}" method="POST">
        @csrf
        @if(session('idApoderado'))
            <div class="mb-3">
                <label for="idPreinscripcion" class="form-label">idAPoderado</label>
                <input type="input" class="form-control" id="idPreinscripcion" name="idPreinscripcion" readonly value="{{ session('idApoderado') }}">
            </div>
            
        @endisset
        
        <div class="mb-3">
            <label for="nombreInteresado" class="form-label">Nombres Interesado</label>
            <input type="input" class="form-control" id="nombreInteresado" name="nombreInteresado">
            
        </div>
        <div class="mb-3">
            <label for="apellidoInteresado" class="form-label">Apellidos Interesado</label>
            <input type="input" class="form-control" id="apellidoInteresado" name="apellidoInteresado">
        </div>
        <div class="mb-3">
            <label for="dniInteresado" class="form-label">DNI</label>
            <input type="input" class="form-control" id="dniInteresado" name="dniInteresado">
        </div>
        <div class="mb-3">
            <label for="fechaAdmision" class="form-label">Fecha Admision</label>
            <input type="date" class="form-control" id="fechaAdmision" name="fechaAdmision">
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" name="sexo" id="sexo">
                <option selected value="H">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nivel" class="form-label">Nivel</label>
            <select class="form-select" id="nivel" name="nivel">
                <option selected>Seleccione un nivel</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="grado" class="form-label">Grado</label>
            <select class="form-select" id="grado" name="idGrado">
            </select>
        </div>
        <button type="submit" class="btn btn-primary">GUARDAR</button>
    </form>

@endsection

@section('scripts')
    <script>
        // Función para obtener los niveles y grados desde la API
        async function cargarNiveles() {
            try {
                // Hacer la solicitud fetch a la ruta definida en Laravel
                const response = await fetch("{{ route('apiNivel') }}");
                const niveles = await response.json(); // Obtener los datos en formato JSON

                // Llenar el select de niveles
                const nivelSelect = document.getElementById('nivel');
                niveles.forEach(nivel => {
                    const option = document.createElement('option');
                    option.value = nivel.idNivel;
                    option.textContent = nivel.nivel;
                    nivelSelect.appendChild(option);
                });

                // Event listener para actualizar los grados cuando se seleccione un nivel
                nivelSelect.addEventListener('change', function () {
                    const nivelId = this.value;
                    if (nivelId) {
                        cargarGrados(nivelId, niveles); // Llamar la función para cargar los grados
                    }
                });

            } catch (error) {
                console.error('Error al cargar los niveles:', error);
            }
        }

        // Función para cargar los grados correspondientes al nivel seleccionado
        function cargarGrados(nivelId, niveles) {
            const gradoSelect = document.getElementById('grado');
            gradoSelect.innerHTML = '<option selected>Seleccione un grado</option>'; // Limpiar grados previos

            // Buscar el nivel seleccionado
            const nivel = niveles.find(nivel => nivel.idNivel == nivelId);

            if (nivel && nivel.grado) {
                nivel.grado.forEach(grado => {
                    const option = document.createElement('option');
                    option.value = grado.idGrado;
                    option.textContent = grado.grado;
                    gradoSelect.appendChild(option);
                });
            }
        }

        // Llamamos la función para cargar los niveles al cargar la página
        cargarNiveles();
    </script>
@endsection


@extends('prueba')

@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{route('preinscripcionIndex',['idPreinscripcion' => $idPreinscripcion])}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{route('expedienteAdmision',['idInteresado' => $interesado->idInteresado])}}" class="nav-link ">Expediente</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('entrevista',['idInteresado' => $interesado->idInteresado])}}" class="nav-link ">Entrevista</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('observacion',['idInteresado' => $interesado->idInteresado])}}" class="nav-link ">Observaciones</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

@section('contenido')
    <div class="container my-5">
        <h1 class="mb-4">Programación de la Entrevista</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Tarjeta contenedora -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Detalles de la Entrevista</h5>
                    </div>
                    <div class="card-body">

                        <!-- Campo para seleccionar fecha de la entrevista -->
                        <div class="mb-3">
                            <label for="fechaEntrevista" class="form-label">Fecha de la entrevista</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="fechaEntrevista" placeholder="Selecciona la fecha" aria-describedby="fechaHelp">
                                <span class="input-group-text" id="fechaHelp"><i class="bi bi-calendar3"></i></span>
                            </div>
                            <small class="text-muted">Seleccione la fecha en el calendario.</small>
                        </div>

                        <!-- Campo para seleccionar hora -->
                        <div class="mb-3">
                            <label for="horaEntrevista" class="form-label">Hora de la entrevista</label>
                            <input type="time" class="form-control" id="horaEntrevista" placeholder="Hora de la entrevista" value="09:00">
                            <small class="text-muted">Seleccione la hora aproximada de la reunión.</small>
                        </div>

                        <!-- Campo para el lugar de la entrevista -->
                        <div class="mb-3">
                            <label for="lugarEntrevista" class="form-label">Lugar de la entrevista</label>
                            <input type="text" class="form-control" id="lugarEntrevista" placeholder="Ej: Sala de Entrevistas #1">
                            <small class="text-muted">Indicar el lugar físico o virtual de la reunión.</small>
                        </div>

                        <!-- Campo readonly para la nota asignada al finalizar -->
                        <div class="mb-3">
                            <label for="notaEntrevista" class="form-label">Nota Final (asignada después de la entrevista)</label>
                            <input type="text" class="form-control" id="notaEntrevista" value="Pendiente" readonly>
                            <small class="text-muted">La nota será visible después de la reunión.</small>
                        </div>

                        <!-- Sección para botones según la nota -->
                        <div class="mt-4" id="accionesSegunNota">
                            <!-- Aquí mostraremos el botón u otros comentarios basado en la nota -->
                            <!-- Por ejemplo, si la nota >= 10, "Continuar proceso", si no, "Ver comentarios" -->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar el datepicker con flatpickr (como ejemplo)
            flatpickr("#fechaEntrevista", {
                dateFormat: "Y-m-d",
                minDate: "today",
                locale: "es"
            });
    
            // Simulemos que la nota se obtiene después de la entrevista (por ahora es "Pendiente")
            // Supongamos que luego de la entrevista la nota se guardará en la BD y se recargará esta vista con la nota.
            // Para demostrar la lógica, definiremos la nota aquí.
            let nota = null; // null significa pendiente
            // Ejemplo: Si se hubiera evaluado y la nota es:
            // let nota = 15; // Aprobado para continuar
            // let nota = 8;  // No aprobado, mostrar comentarios
    
            const accionesContainer = document.getElementById('accionesSegunNota');
            const notaInput = document.getElementById('notaEntrevista');
    
            if (nota === null) {
                // No hay nota asignada aún
                notaInput.value = 'Pendiente';
                accionesContainer.innerHTML = `<span class="text-muted">Aún no se ha realizado la entrevista, no hay acciones disponibles.</span>`;
            } else {
                // Hay nota
                notaInput.value = nota;
    
                if (nota >= 10) {
                    // Aprobado
                    accionesContainer.innerHTML = `
                        <div class="alert alert-success" role="alert">
                            El apoderado y su hijo han sido aprobados para continuar con el proceso de matrícula.
                        </div>
                        <button type="button" class="btn btn-primary">Continuar Proceso</button>
                    `;
                } else {
                    // No aprobado
                    accionesContainer.innerHTML = `
                        <div class="alert alert-danger" role="alert">
                            El apoderado no ha logrado la calificación mínima.
                        </div>
                        <label for="comentariosNota" class="form-label">Comentarios</label>
                        <textarea class="form-control" id="comentariosNota" rows="3" readonly>La calificación fue baja debido a XYZ...</textarea>
                    `;
                }
            }
        });
    </script>
@endsection



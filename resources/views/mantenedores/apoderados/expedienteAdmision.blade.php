@extends('prueba')

@section('styles')
    
@endsection

@section('contenido')
    <h4 class="text-center text-primary my-4">📂 Subir Expediente de Admisión</h4>
    <p class="text-muted text-center mb-5">Completa todos los campos requeridos para enviar el expediente de admisión. ¡Asegúrate de subir los documentos correctos en formato PDF! 🚀</p>

    <form action="{{ route('subirExpedienteAdmision') }}" method="POST" enctype="multipart/form-data" class="p-4 shadow-lg rounded bg-light">
        @csrf
        
        <!-- Campo: ID Expediente -->
        <div class="mb-3">
            <label for="idExpediente" class="form-label fw-bold">ID Expediente</label>
            <input type="text" class="form-control" id="idExpediente" name="idExpediente" placeholder="Ingrese el ID del expediente" required>
        </div>

        <!-- Campo: ID Interesado -->
        <div class="mb-3">
            <label for="idInteresado" class="form-label fw-bold">ID Interesado</label>
            <input type="text" class="form-control" id="idInteresado" name="idInteresado" placeholder="Ingrese el ID del interesado" required>
        </div>

        <!-- Documentos -->
        <h5 class="mt-4 mb-3 text-secondary">📄 Subir Documentos</h5>

        <!-- Campo: Compromiso -->
        <div class="mb-3">
            <label for="urlCompromiso" class="form-label">Compromiso firmado (PDF)</label>
            <input type="file" class="form-control" id="urlCompromiso" name="urlCompromiso" accept=".pdf" required>
            <small class="text-muted">Sube el compromiso firmado en formato PDF.</small>
        </div>

        <!-- Campo: Carta de referencia -->
        <div class="mb-3">
            <label for="urlCartaReferencia" class="form-label">Carta de Referencia (PDF)</label>
            <input type="file" class="form-control" id="urlCartaReferencia" name="urlCartaReferencia" accept=".pdf" required>
            <small class="text-muted">Sube la carta de referencia en formato PDF.</small>
        </div>

        <!-- Campo: DNI Apoderado -->
        <div class="mb-3">
            <label for="urlDniApoderado" class="form-label">DNI del Apoderado (PDF)</label>
            <input type="file" class="form-control" id="urlDniApoderado" name="urlDniApoderado" accept=".pdf" required>
            <small class="text-muted">Sube una copia escaneada del DNI del apoderado en formato PDF.</small>
        </div>

        <!-- Campo: DNI Interesado -->
        <div class="mb-3">
            <label for="urlDniInteresado" class="form-label">DNI del Interesado (PDF)</label>
            <input type="file" class="form-control" id="urlDniInteresado" name="urlDniInteresado" accept=".pdf" required>
            <small class="text-muted">Sube una copia escaneada del DNI del interesado en formato PDF.</small>
        </div>

        <!-- Campo: Comprobante de Derecho de Inscripción -->
        <div class="mb-3">
            <label for="urlComprobanteDerechoInscripcion" class="form-label">Comprobante de Derecho de Inscripción (PDF)</label>
            <input type="file" class="form-control" id="urlComprobanteDerechoInscripcion" name="urlComprobanteDerechoInscripcion" accept=".pdf" required>
            <small class="text-muted">Sube el comprobante de pago del derecho de inscripción.</small>
        </div>

        <!-- Campo: Constancia de No Adeudo -->
        <div class="mb-3">
            <label for="urlConstanciaNoAdeudo" class="form-label">Constancia de No Adeudo (PDF)</label>
            <input type="file" class="form-control" id="urlConstanciaNoAdeudo" name="urlConstanciaNoAdeudo" accept=".pdf" required>
            <small class="text-muted">Sube la constancia de no adeudo emitida por la institución.</small>
        </div>

        <!-- Campo: Libreta de Notas -->
        <div class="mb-3">
            <label for="urlLibretaNota" class="form-label">Libreta de Notas (PDF)</label>
            <input type="file" class="form-control" id="urlLibretaNota" name="urlLibretaNota" accept=".pdf" required>
            <small class="text-muted">Sube la libreta de notas en formato PDF.</small>
        </div>

        <!-- Campo: Constancia de Matrícula del Colegio Anterior -->
        <div class="mb-3">
            <label for="urlConstanciaMatriculaColegioAnterior" class="form-label">Constancia de Matrícula del Colegio Anterior (PDF)</label>
            <input type="file" class="form-control" id="urlConstanciaMatriculaColegioAnterior" name="urlConstanciaMatriculaColegioAnterior" accept=".pdf" required>
            <small class="text-muted">Sube la constancia de matrícula del colegio anterior en formato PDF.</small>
        </div>

        <!-- Campo: Estado del Expediente -->
        <div class="mb-3">
            <label for="idEstadoExpediente" class="form-label fw-bold">Estado del Expediente</label>
            <input type="text" class="form-control" id="idEstadoExpediente" name="idEstadoExpediente" placeholder="Ingrese el estado del expediente" required>
        </div>

        <!-- Botón de Enviar -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg px-5">
                📤 Enviar Expediente
            </button>
        </div>
    </form>
@endsection


@section('scripts')
    
@endsection
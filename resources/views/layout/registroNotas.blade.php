@extends('prueba')
@section('contenido')
    <<div class="container">
      <h1>Registrar Notas</h1>
      <form method="POST">
        @csrf
        <div class="form-group">
          <label for="" >Curso :</label>
          <input type="text" class="form-control" id="curso" name="curso">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label">Grado</label>
          <select id="disabledSelect" class="form-select">
            <option>PRIMER</option>
            <option>SEGUNDO</option>
            <option>TERCERO</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label">Seccion</label>
          <select id="disabledSelect" class="form-select">
            <option>A</option>
            <option>B</option>
            <option>C</option>
          </select>
        </div>
    
        <div class="mb-3">
          <label for="disabledSelect" class="form-label">Nivel</label>
          <select id="disabledSelect" class="form-select">
            <option>INICIAL</option>
            <option>PRIMARIA</option>
            <option>SECUNDARIA</option>
          </select>
        </div>
        <div class="form-group">
          <label for="" >Codigo :</label>
          <input type="text" class="form-control" id="id" name="id">
        </div>
        <div class="form-group">
          <label for="" >Periodo :</label>
          <input type="text" class="form-control" id="fecha" name="fecha">
        </div>
        <div class="form-group">
          <label for="" >Docente:</label>
          <input type="text" class="form-control" id="docente" name="docente">
        </div>
        
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
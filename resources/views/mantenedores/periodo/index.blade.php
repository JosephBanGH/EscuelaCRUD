@extends('prueba')
@section('styles')
    <style>
        .modalPeriodo{
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            width: 100%;
            height: 100%;
            background-color: rgb(0, 0, 0,0.5);
        }

        .bodyModalPeriodo{
          padding: 10px;
          margin: 10% auto;
          background-color: #8466e4;
          border-radius: 20px;
          width: 300px;
        }

        .closePeriodo{
          background-color: rgb(254, 21, 68);
          padding: 6px;
          border-radius: 8px;
          cursor: pointer;
        }

    </style>
@endsection


@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{route('inicioDireccion')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item ">
                <a class="nav-link" data-bs-toggle="collapse" href="#periodo" role="button" aria-expanded="false" aria-controls="periodo">
                  <i class="link-icon" data-feather="mail"></i>
                  <span class="link-title">PERIODO</span>
                  <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse " id="periodo">
                  <ul class="nav sub-menu">
                    <li class="nav-item">
                      <a href="{{route('myPeriodo.index')}}" class="nav-link ">Nuevo Periodo</a>
                    </li>
                  </ul>
                </div>
              </li>
        </ul>
    </div> 
@endsection

@section('contenido')
    <h1>INICIAR PERIODO</h1>
    

    <button type="button" class="btn btn-primary abrirModalitoPeriodo">NUEVO PERIODO</button>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="modalPeriodo">
        <div class="bodyModalPeriodo">
          <i class="closePeriodo" >&#88;</i>
            <form method="POST" action="{{ route('myPeriodo.store') }}">
              @csrf
                <div class="form-group">
                    <label for="inicioPeriodo">INICIO PERIODO</label>
                    <input type="date" class="form-control" id="inicioPeriodo" name="inicioPeriodo">
                </div>
                <div class="form-group">
                    <label for="finPeriodo">FIN PERIODO</label>
                    <input type="date" class="form-control" id="finPeriodo" name="finPeriodo">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">INICIO PERIODO</th>
            <th scope="col">FIN PERIODO</th>
            <th scope="col">ESTADO</th>
            <th scope="col">EDITAR</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $periodoActivo->inicioPeriodo }}</td>
            <td>{{ $periodoActivo->finPeriodo }}</td>
            <td>{{ $periodoActivo->estado }}</td>
            <td>
                <button type="button" class="btn btn-primary">EDITAR PERIODO</button>
            </td>
          </tr>
        </tbody>
      </table>
    
@endsection
@section('scripts')
  <script>
    const modalitoPeriodo = document.querySelector('.modalPeriodo')
    const abrirModalitoPeriodo = document.querySelector('.abrirModalitoPeriodo')

    modalitoPeriodo.addEventListener('click',(e)=>{
      if(e.target.classList.contains('closePeriodo')){
        modalitoPeriodo.style.display = "none";
        console.log('3d')
      }
    })

    abrirModalitoPeriodo.addEventListener('click',(e)=>{
      modalitoPeriodo.style.display = "block";
    })

  </script>
@endsection
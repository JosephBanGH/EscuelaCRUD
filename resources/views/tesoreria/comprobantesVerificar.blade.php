@extends('prueba')
@section('metas')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
@endsection
@section('styles')
    <style>
        .modalComprobantes{
            position: fixed;
            top:0;
            left: 0;
            z-index: 1000;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            overflow-y: auto;
        }

        .modal-content-comprobante{
            background-color: #fff;
            border-radius: 10px;
            margin: 10% auto;
            overflow: auto;
        }

        .modal-content-comprobante img {
            mwidth: 100%;
            max-height: 100%;
            
        }

        .closePopupComprobantes{
            background-color: red;
            border-radius: 15px;
            padding: 5px;
            cursor: pointer;
        }
    </style>
@endsection


@section('sideBody')
    <div class="sidebar-body mb-5">
        <ul class="nav">
            <li class="nav-item nav-category">MAIN</li>
            <li class="nav-item active">
                <a href="{{route('indexTesoreria')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">PRINCIPAL</span>
                </a>
            </li>
            <li class="nav-item nav-category">SISTEMA</li>
            <li class="nav-item ">
                <a class="nav-link" data-bs-toggle="collapse" href="#comprobante" role="button" aria-expanded="false" aria-controls="comprobante">
                  <i class="link-icon" data-feather="mail"></i>
                  <span class="link-title">COMPROBANTES</span>
                  <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse " id="comprobante">
                  <ul class="nav sub-menu">
                    <li class="nav-item">
                      <a href="{{route('verificarComprobantes')}}" class="nav-link ">Verificar validez</a>
                    </li>
                  </ul>
                </div>
              </li>
        </ul>
    </div> 
@endsection


@section('contenido')
    <h1>TESORERIA</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead>
            <th scope="col">NUMERO OPERACION</th>
            <th scope="col">CONCEPTO</th>
            <th scope="col">MONTO</th>
            <th scope="col">FECHA PAGO</th>
            <th scope="col">COMPROBANTE</th>
            <th scope="col">VERIFICAR</th>
        </thead>
        <tbody class="comprobante-rows">
            @foreach($comprobantes as $comprobante)
                <tr scope="row"  style="cursor:pointer;" id="{{ $comprobante->idComprobante }}" data-url="{{ Storage::url($comprobante->urlCDP) }}" data-tipo="{{ pathinfo($comprobante->urlCDP, PATHINFO_EXTENSION) }}">
                    <td>{{ $comprobante -> numOperacion}}</td>
                    <td>{{ $comprobante -> concepto}}</td>
                    <td> {{ $comprobante -> monto }} </td>
                    <td> {{ $comprobante -> fechaPago }} </td>
                    <td>
                        @if(pathinfo($comprobante->urlCDP, PATHINFO_EXTENSION) === 'pdf')
                            <img src="{{ asset('storage/images/pdf.png') }}" alt="" class="rounded">
                        @else
                            <img src="{{ Storage::url($comprobante -> urlCDP) }} " alt="" class="rounded">
                        @endif
                        
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary verificar-btn">
                            Verificar
                        </button>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div id="modalPopupComprobantes" class="modalComprobantes" style="display:none;">
        <div class="modal-content-comprobante">
            <span class="closePopupComprobantes">&times;</span>
            <div id="modalBody">
                <!-- Aquí se mostrará la imagen o el PDF -->
                
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            let modalito = document.getElementById('modalPopupComprobantes');
            let modalBody = document.getElementById("modalBody"); // Donde se mostrará la imagen o el PDF
            let spancito = document.querySelector('.closePopupComprobantes');
            

            //Cuando el usuario hace clic en un fila de la tabla
            let comprobante_rows = document.querySelector('.comprobante-rows')
            comprobante_rows.addEventListener('click',(e)=>{
                if(e.target.tagName !== 'BUTTON'){
                    let fila = e.target.closest("tr")
                    if(!fila) return;

                    //Obtener los datos de la fila
                    let url = fila.getAttribute('data-url');
                    let tipo = fila.getAttribute('data-tipo');

                    modalBody.innerHTML = "";

                    if(tipo==='pdf'){
                        let iframe = document.createElement("iframe");
                        iframe.src = url;
                        iframe.width = "100%";
                        iframe.height = "500px";
                        modalBody.appendChild(iframe);
                    }else{
                        let img = document.createElement("img");
                        img.src = url;
                        img.alt = "Comprobante de pago";
                        img.style.width = "100%";
                        modalBody.appendChild(img);
                    }
                    modalito.style.display = "block";
                }else if(e.target.tagName === 'BUTTON'){
                    let fila = e.target.closest("tr")
                    if(!fila) return;

                    let id = fila.getAttribute('id')
                    
                    
                    fetch(`/tesoreria/comprobantes/verificar/${id}`,{
                        method: 'PUT',
                        headers:{
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success){
                            fila.style.backgroundColor = '#A3E7D6';
                            e.target.classList.remove('btn-primary');
                            e.target.classList.add('btn-success');
                            e.target.disabled = true;
                        }else{
                            alert('Hubo un error al verificar el comprobante')
                        }
                    })
                    .catch(error =>{
                        console.error('Error: ',error);
                        alert('Error al intentar verificar el comprobante');
                    });
                }
            });
            
            spancito.onclick = function(){
                modalito.style.display = "none";
            }

            modalito.addEventListener('click',(e)=>{
                if(e.target===modalito){
                    modalito.style.display = "none";
                }
            })
        });
    </script>
@endsection
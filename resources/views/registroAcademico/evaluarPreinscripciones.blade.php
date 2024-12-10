@extends('prueba')

@section('styles')
    
@endsection

@section('contenido')
    <h4>Solicitudes de Preinscripción</h4>
    <table class="table table-striped mt-2 ml-4 mr-4">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Apoderado</th>
            <th scope="col">Dni</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($preinscripciones as $preinscripcion)
                <tr>
                    <th scope="row">{{ $preinscripcion->idPreinscripcion }}</th>
                    <td>{{$preinscripcion->apellidoApoderado}}, {{$preinscripcion->nombreApoderado}}</td>
                    <td>{{$preinscripcion->dni}}</td>
                    <td>{{$preinscripcion->numTelefono}}</td>
                    <td>{{$preinscripcion->correo}}</td>
                    <td>
                        <button type="button" class="btn btn-primary">Evaluar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection


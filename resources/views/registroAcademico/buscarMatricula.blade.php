@extends('prueba')

@section('contenido')
    <section class="content">
        <div class="container mt-4">
            <h3 class="mb-4">Listado de Alumnos</h3>
            <div class="d-flex flex-column mb-4 mt-4">
                <h5>Buscar Por Nombre Completo</h5>
                <form class="form-inline mt-2" method="GET">
                    <div class="input-group d-flex justify-content-end">
                        <div class="input-group">
                            <input name="nombreCompleto" id="nombreCompleto" class="form-control" type="search" placeholder="Buscar por Apellidos y nombres" value="{{ request('nombreCompleto') }}">
                        </div>
                        <div class="input-group-append mt-2">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex flex-column mb-4">
                <h5>Buscar por Grado, Seccion o nivel</h5>
                <form class="form-inline mt-2" method="GET">
                    <div class="input-group d-flex justify-content-end">
                        <div class="input-group">
                            <input name="anioPeriodo" class="form-control" type="search" placeholder="Buscar por anioPeriodo" value="{{ request('anioPeriodo') }}">
                        </div>
                        <div class="input-group">
                            <input name="nivel" class="form-control" type="search" placeholder="Buscar por nivel" value="{{ request('nivel') }}">
                        </div>
                        <div class="input-group">
                            <input name="grado" class="form-control" type="search" placeholder="Buscar por grado" value="{{ request('grado') }}">
                        </div>
                        <div class="input-group">
                            <input name="seccion" class="form-control" type="search" placeholder="Buscar por sección" value="{{ request('seccion') }}">
                        </div>
                        <div class="input-group-append mt-2">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex flex-column mb-4">
                <h5>Buscar por DNI</h5>
                <form class="form-inline mt-2" method="GET">
                    <div class="input-group d-flex justify-content-end">
                        <div class="input-group">
                            <input name="dni" class="form-control" type="search" placeholder="Buscar por dni" value="{{ request('dni') }}">
                        </div>
                        <div class="input-group-append mt-2">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
                        
            @if(session('datos'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role='alert'>
                {{session('datos')}}
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if($alumno->isEmpty())
                <div class="alert alert-info mt-3" role="alert">
                    No hay resultados para la búsqueda.
                </div>
            @else
                <div class="table-responsive">
                    <table id="personalTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Fecha Matricula</th>
                            <th scope="col">Seccion/Grado</th>
                            <th scope="col">Periodo Matricula</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (count($alumno)>=0)
                                    @foreach($alumno as $itemalumno)
                                    <tr>
                                        @foreach($itemalumno->matricula as $matricula)
                                            <td>{{$itemalumno->dni}}</td>
                                            <td>{{$itemalumno->apellido_paterno}} {{$itemalumno->apellido_materno}}, {{$itemalumno->primer_nombre}} {{$itemalumno->otros_nombre}}</td>
                                            <td>{{\Carbon\Carbon::parse($matricula->fechaMatricula)->format('d-m-Y')}}</td>
                                            <td>{{$matricula->seccion->seccion}} {{$matricula->seccion->grado->grado}},{{$matricula->seccion->grado->nivel->nivel}}</td>
                                            <td>{{\Carbon\Carbon::parse($matricula->periodo->inicioPeriodo)->format('d-m-Y')}} -- {{\Carbon\Carbon::parse($matricula->periodo->finPeriodo)->format('d-m-Y')}}</td>
                                            <td>
                                                <a href="{{ route('editarMatricula', $matricula->numMatricula) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil"></i> Editar Matricula
                                                </a>
                                            </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $alumno->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/limpiarFormularios.js') }}"></script>
@endsection
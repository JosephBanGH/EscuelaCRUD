@section('contenido')
    <div class="container">
        <h1>Desea eliminar registro ? Codigo : {{ $producto->codigo_docente }} - nombres : {{ $producto->nombres }} </h1>
        <form method="POST" action="{{ route('producto.destroy',$producto->codigo_docente)}}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas facheck-square"></i> SI</button>
            <a href="{{ route('cancelar')}}" class="btn btnprimary"><i class="fas fa-times-circle"></i> NO</button></a>
        </form>
    </div>
@endsection
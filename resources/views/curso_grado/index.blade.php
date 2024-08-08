@extends('prueba')

@section('titulo')
    <title>Cursos por Grado</title>
@endsection

@section('contenido')
    <div class="container mt-4">
        <h3 class="mb-4">Cursos por Grado</h3>

        <div class="tree">
            <ul>
                @foreach($nivelesEducativos as $nivel => $grados)
                    <li>
                        <span onclick="toggleTree(event)">{{ $nivel }}</span>
                        <ul class="hidden">
                            @foreach($grados as $grado)
                                <li>
                                    <span onclick="toggleTree(event)">{{ $grado->grado }} - {{ $grado->seccion }}</span>
                                    <ul class="hidden">
                                        @foreach($grado->cursos as $curso)
                                            <li>{{ $curso->nombre_curso }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <style>
        .tree, .tree ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .tree ul {
            margin-left: 20px;
        }
        .tree li {
            margin: 0 0 10px 0;
            padding: 0 5px;
            line-height: 20px;
            color: #369;
            font-weight: 700;
            position: relative;
        }
        .tree li::before {
            content: "";
            position: absolute;
            top: 0;
            left: -20px;
            border-left: 1px solid #777;
            border-bottom: 1px solid #777;
            bottom: 50%;
            width: 20px;
            height: 20px;
        }
        .tree li::after {
            content: "";
            position: absolute;
            top: 50%;
            left: -20px;
            border-left: 1px solid #777;
            border-top: 1px solid #777;
            top: 20px;
            width: 20px;
            height: 100%;
        }
        .tree li:last-child::after {
            display: none;
        }
        .tree li:last-child::before {
            border-radius: 0 0 0 5px;
        }
        .tree li span {
            cursor: pointer;
        }
        .hidden {
            display: none;
        }
    </style>

    <script>
        function toggleTree(event) {
            const target = event.target;
            const nextElement = target.nextElementSibling;
            if (nextElement) {
                nextElement.classList.toggle('hidden');
            }
        }
    </script>
@endsection

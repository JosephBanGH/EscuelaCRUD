<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Constancia de Matrícula</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        /* Estilo del contenedor principal */
        .container {
            width: 100%;
            max-width: 980px;
            height: 630px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Cabecera */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 26px;
            color: #003366;
            margin-bottom: 10px;
        }

        .header h3 {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        /* Alineación y estilo de las imágenes */
        .headerImagenes {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-bottom: 20px;
        }

        .headerImagenes img {
            width: 90px;
            height: auto;
        }

        /* Contenido principal */
        .content {
            text-align: justify;
            font-size: 14px;
            line-height: 1.6;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .content strong {
            font-weight: bold;
            color: #333;
        }

        /* Firma */
        .signature {
            margin-top: 50px;
            text-align: center;
            position: relative;
        }

        .signature img {
            position: absolute;
            bottom: 0;
            width: 200px;
        }

        .signature p {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 30px;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logos del encabezado -->
            <div class="headerImagenes">
                <img src="{{ public_path('img/insignia.png') }}" alt="Insignia">
                <img src="{{ public_path('img/escudo-del-peru.png') }}" alt="Escudo del Perú">
            </div>
            <h1>Institución Educativa Mariano Melgar 1314</h1>
            <h3>Constancia de Matrícula</h3>
        </div>

        <div class="content">
            <p>
                Se deja constancia de que el estudiante <strong>{{ $matricula->alumno->apellido_paterno }} {{ $matricula->alumno->apellido_materno }}, {{ $matricula->alumno->primer_nombre }} {{ $matricula->alumno->otros_nombre }}</strong>
                con DNI <strong>{{ $matricula->alumno->dni }}</strong>, ha sido matriculado en el
                <strong>{{ $matricula->seccion->grado->nivel->nivel }}</strong>,
                grado <strong>{{ $matricula->seccion->grado->grado }}</strong>,
                sección <strong>{{ $matricula->seccion->seccion }}</strong>, durante el periodo académico
                <strong>{{ \Carbon\Carbon::parse($matricula->periodo->inicioPeriodo)->format('Y') }}</strong>.
            </p>
        </div>

        <div class="signature">
            <!-- Firma del director -->
            <img src="{{ public_path('img/firmaDirector.png') }}" alt="Firma del Director">
            <p>______________________________</p>
            <p>Director de la Institución</p>
        </div>

        <div class="footer">
            <p>Villa El Salvador - Teléfono: 990102389 - 2871375</p>
            <p>Mz "E" lote 31 - 32 sector 1 barrio 2</p>
        </div>
    </div>
</body>
</html>

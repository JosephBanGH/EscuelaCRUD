<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Ruta predeterminada para las exportaciones
    |--------------------------------------------------------------------------
    |
    | Este valor determina dónde se guardarán las exportaciones.
    |
    */
    'exports' => [
        'path' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuración de importaciones
    |--------------------------------------------------------------------------
    |
    | Define los comportamientos para las importaciones de Excel.
    |
    */
    'imports' => [
        'heading' => 'slugged', // Opciones: 'slugged', 'original', 'mapped'
        'force_sheets_collection' => false,
        'ignore_empty' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Controles del lector y escritor
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar los controladores que se usarán para manejar
    | archivos específicos.
    |
    */
    'extension_detector' => [
        'xlsx' => \PhpOffice\PhpSpreadsheet\Reader\Xlsx::class,
        'xls' => \PhpOffice\PhpSpreadsheet\Reader\Xls::class,
        'csv' => \PhpOffice\PhpSpreadsheet\Reader\Csv::class,
    ],

];

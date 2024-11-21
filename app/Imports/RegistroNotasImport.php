<?php

namespace App\Imports;

use App\Models\RegistroNotas;
use Maatwebsite\Excel\Concerns\ToModel;

class RegistroNotasImport implements ToModel
{
    public function model(array $row)
    {
        return new RegistroNotas([
            'id_curso' => $row[0], // Ajusta según las columnas del archivo Excel
            'fecha' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]), // Convertir fecha
        ]);
    }
}

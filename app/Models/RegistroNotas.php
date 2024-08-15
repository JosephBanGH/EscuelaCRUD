<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroNotas extends Model
{
    use HasFactory;

    protected $table = 'registro_de_notas'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_registro'; // Clave primaria
    public $timestamps = false; // Si no usas timestamps, establece esto en false

    protected $fillable = [
        'id_curso',
        'id_grado',
        'codigo_docente',
        'fecha'
    ];

    public function catedra()
    {
        return $this->belongsTo(Catedra::class, ['id_curso', 'id_grado', 'codigo_docente'], ['id_curso', 'id_grado', 'codigo_docente']);
    }
}

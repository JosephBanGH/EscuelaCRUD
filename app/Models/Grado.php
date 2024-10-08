<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    protected $table = 'GRADO'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'idGrado'; // Clave primaria
    public $timestamps = false; // Desactivar timestamps

    protected $fillable = [
        'grado',
        'idNivel'
    ];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'idNivel', 'idNivel');
    }

    public function seccion()
    {
        return $this->hasMany(Seccion::class, 'idGrado', 'idGrado');
    }
}

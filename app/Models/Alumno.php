<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumnos';
    protected $primaryKey = 'codigo_estudiante';
    public $timestamps=false;

    protected $fillable = [
        'apellido_paterno','apellido_materno','primer_nombre','otros_nombres','id_nivel'
    ];

    public function matricula()
    {
        return $this->hasMany(Matricula::class,'codigo_estudiante','codigo_estudiante');
    }
}

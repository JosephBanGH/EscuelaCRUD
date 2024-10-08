<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'ESTUDIANTE';
    protected $primaryKey = 'codigoEstudiante';
    public $timestamps=false;

    protected $fillable = [
        'dni',
        'apellido_paterno',
        'apellido_materno',
        'primer_nombre',
        'otros_nombre',
        'estado',
        'idEscala'
    ];

    public function matricula()
    {
        return $this->hasMany(Matricula::class,'codigoEstudiante','codigoEstudiante');
    }

    
}

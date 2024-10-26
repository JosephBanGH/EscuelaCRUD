<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApoderadoEstudiante extends Model
{
    use HasFactory;
    protected $table = 'APODERADO_ESTUDIANTE';
    protected $fillable = [
        'codigoEstudiante',
        'dniApoderado',
    ];

    // Relación belongsTo con Apoderado
    public function apoderado()
    {
        return $this->belongsTo(Apoderado::class, 'dniApoderado', 'dniApoderado');
    }

    // Relación belongsTo con Alumno
    public function estudiante()
    {
        return $this->belongsTo(Alumno::class, 'codigoEstudiante', 'codigoEstudiante');
    }
}

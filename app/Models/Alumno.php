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
        'idEscala',
        'urlImagen'
    ];

    public function matricula()
    {
        return $this->hasMany(Matricula::class,'codigoEstudiante','codigoEstudiante');
    }

    public function Escala()
    {
        return $this->belongsTo(Escala::class,'idEscala','idEscala');
    }

    // Relación belongsToMany con Apoderado a través de la tabla intermedia APODERADO_ESTUDIANTE
    public function apoderados()
    {
        return $this->belongsToMany(Apoderado::class, 'APODERADO_ESTUDIANTE', 'codigoEstudiante', 'dniApoderado');
    }
    
    // Relación con la tabla intermedia si necesitas acceso directo
    public function apoderadoEstudiantes()
    {
        return $this->hasMany(ApoderadoEstudiante::class, 'codigoEstudiante', 'codigoEstudiante');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    use HasFactory;
    protected $table='APODERADO';
    protected $primaryKey = 'dniApoderado';
    public $timestamps = false;

    protected $fillable =[
        'apellido_paterno',
        'apellido_materno',
        'primer_nombre',
        'otros_nombre',
        'urlImagen'
    ];

    public function apoderadoEstudiante(){
        return $this->hasMany(ApoderadoEstudiante::class,'dniApoderado','dniApoderado');
    }

    public function estudiantes(){
        return $this->belongsToMany(Alumno::class,'APODERADO_ESTUDIANTE','dniApoderado', 'codigoEstudiante');
    }

}

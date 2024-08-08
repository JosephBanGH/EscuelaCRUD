<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    protected $table = 'matricula';
    protected $primaryKey = 'numero_matricula';
    public $timestamps=false;

    protected $fillable = [
        'codigo_estudiante','id_grado','fecha','estado'
    ];

    public function alumno()
    {
        return $this->hasOne(Alumno::class,'codigo_estudiante','codigo_estudiante');
    }
    public function grado()
    {
        return $this->hasOne(Grado::class,'id_grado','id_grado');
    }
}

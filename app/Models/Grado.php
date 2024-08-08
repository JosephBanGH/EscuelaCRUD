<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grado';
    protected $primaryKey = 'id_grado';
    public $timestamps = false;
    protected $fillable = [
        'nivel', 'grado', 'seccion','estado'
    ];
    
    public function matricula()
    {
        return $this->hasMany(Matricula::class,'id_grado','id_grado');
    }
    public function cursoGrado()
    {
<<<<<<< HEAD
        return $this->hasMany(CursoGrado::class, 'id_grado');
=======
        return $this->belongsToMany(Cursos::class, 'curso_grado', 'id_grado', 'id_curso')
                    ->withPivot('nivel', 'periodo_escolar', 'nombre_curso')
                    ->wherePivot('nivel', $this->nivel); // Filtra por nivel para asegurar que los cursos correspondan al nivel del grado
>>>>>>> ac9e31020c84a949bd2a80799ebb3384bc7b2ad2
    }
}

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
    public function cursos()
    {
<<<<<<< HEAD
        return $this->belongsToMany(Cursos::class, 'curso_grado', 'id_grado', 'id_curso')
                    ->withPivot('nivel', 'periodo_escolar', 'nombre_curso')
                    ->wherePivot('nivel', $this->nivel); // Filtra por nivel para asegurar que los cursos correspondan al nivel del grado
=======
        return $this->belongsToMany(Cursos::class, 'curso_grado', 'grado_id', 'curso_id');
>>>>>>> 9b77ab27bc23b6242dc0ae0d62d8bcee73d3c9ab
    }
}

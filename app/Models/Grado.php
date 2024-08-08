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
        return $this->belongsToMany(Cursos::class, 'curso_grado', 'grado_id', 'curso_id');
=======
        return $this->belongsToMany(Cursos::class, 'curso_grado', 'id_grado', 'id_curso');
>>>>>>> 3c9928cd98e28fe0a3b802709f01aa2e98c3c744
    }
}

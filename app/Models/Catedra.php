<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Catedra extends Model
{
    use HasFactory;
    protected $table = 'catedra';
    protected $primaryKey = 'idCatedra';
    public $timestamps=false;

    protected $fillable = [
        'idPeriodo',
        'idCurso', 
        'idSeccion',
        'idPersonal',
        'imagenUrl'
    ];

    public function user_login(){
        return $this->hasOne(Personal::class,'codigo_docente','codigo_docente');
    }

    public function curso_grado(){
        return $this->hasMany(CursoGrado::class, 'id_curso', 'id_curso')
            ->where('id_grado', $this->id_grado);
    }

    public function curso(){
        return $this->belongsTo(Cursos::class,'idCurso','idCurso');
    }

    public function seccion(){
        return $this->belongsTo(Seccion::class,'idSeccion','idSeccion');
    }

    public function personal(){
        return $this->belongsTo(Personal::class,'idPersonal','idPersonal');
    }


    public function periodo(){
        return $this->belongsTo(Periodo::class,'idPeriodo','idPeriodo');
    }

    public function notas(){
        return $this->hasMany(Notas::class,'idCatedra','idCatedra');
    }
}
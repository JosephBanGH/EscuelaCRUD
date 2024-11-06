<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    protected $table = 'curso';
    protected $primaryKey = 'idCurso';
    public $timestamps = false;
    protected $fillable = [
        'nombre_curso', 
        'estado',
        'idNivel'
    ];


    public function nivel(){
        return this->belongsTo(Nivel::class, 'idNivel', 'idNivel');
    }

    public function catedra(){
        return $this->hasMany(Catedra::class,'idCurso','idCurso');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;
    protected $table = 'notas';
    public $timestamps=false;
    protected $primaryKey = 'idNota';

    protected $fillable = [
        'idCatedra',
        'codigoEstudiante',
        'idBimestre',
        'nota'
    ]; 

    public function catedra(){
        return $this->belongsTo(Catedra::class,'idCatedra','idCatedra');
    }

    public function bimestre(){
        return $this->belongsTo(Bimestre::class,'idBimestre','idBimestre');
    }

    public function alumno(){
        return $this->belongsTo(Alumno::class,'codigoEstudiante','codigoEstudiante');
    }



}

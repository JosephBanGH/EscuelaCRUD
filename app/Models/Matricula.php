<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    protected $table = 'MATRICULAS';
    protected $primaryKey = 'numMatricula';
    public $timestamps=false;

    protected $fillable = [
        'codigoEstudiante',
        'idSeccion',
        'idPeriodo',
        'fechaMatricula'
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class,'codigoEstudiante','codigoEstudiante');
    }

    public function seccion()
    {
        return $this->belongsTo(Seccion::class,'idSeccion','idSeccion');
    }
    
    public function periodo(){
        return $this->belongsTo(Periodo::class,'idPeriodo','idPeriodo');
    }
}

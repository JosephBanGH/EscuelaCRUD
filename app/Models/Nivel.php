<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table='NIVEL';
    protected $primaryKey = 'idNivel';
    public $timestamps=false;
    protected $fillable = [
        'nivel'
    ];

    public function grado(){
        return $this->hasMany(Grado::class,'idNivel','idNivel');
    }

    public function curso(){
        return $this->hasMany(Cursos::class,'idNivel','idNivel');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;
    protected $table = 'SECCION';

    protected $primaryKey = 'idSeccion';
    public $timestamps = false;

    protected $fillable=[
        'seccion'
    ];

    public function matricula()
    {
        return $this->hasMany(Matricula::class,'idSeccion','idSeccion');
    }

    public function grado(){
        return $this->belongsTo(Grado::class,'idGrado','idGrado');
    }

    public function catedra(){
        return $this->hasMany(Catedra::class,'idSeccion','idSeccion');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interesado extends Model
{
    use HasFactory;
    protected $table = 'INTERESADO';
    protected $primaryKey = 'idInteresado';
    public $timestamps = false;

    protected $fillable = [
        'idPreinscripcion',
        'nombreInteresado',
        'apellidoInteresado',
        'dni',
        'idGrado',
        'fechaAdmision',
        'sexo'
    ];

    public function preinscripcion(){
        return $this->belongsTo(Preinscripcion::class, 'idPreinscripcion', 'idPreinscripcion');
    }

    public function expediente(){
        return $this->hasMany(ExpediteAdmision::class,'idInteresado','idInteresado');
    }

    public function entrevista(){
        return $this->hasMany(Entrevista::class,'idInteresado','idInteresado');
    }

    public function grado(){
        return $this->belongsTo(Grado::class,'idGrado','idGrado');
    }
}

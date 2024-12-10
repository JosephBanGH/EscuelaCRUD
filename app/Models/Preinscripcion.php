<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion extends Model
{
    use HasFactory;
    protected $table = 'PREINSCRIPCION';
    protected $primaryKey = 'idPreinscripcion';
    public $timestamps = false;

    protected $fillable = [
        'nombreApoderado',
        'apellidoApoderado',
        'dni',
        'fechaPreInscripcion',
        'numTelefono',
        'correo',
        'estado'
    ];

    public function interesado(){
        return $this->hasMany(Interesado::class,'idPreinscripcion','idPreinscripcion');
    }
}

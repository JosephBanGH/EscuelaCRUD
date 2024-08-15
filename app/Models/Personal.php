<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
    protected $primaryKey = 'codigo_docente';
    public $timestamps = false;
    protected $fillable = [
        'DNI', 'nombres', 'apellidos', 'direccion', 'estado_civil', 'telefono', 'seguro_social', 'departamento', 'fecha_registro', 'estado'
    ];

    public function catedra() {
        return $this->hasMany(Catedra::class,'codigo_docente','codigo_docente');
    }
}

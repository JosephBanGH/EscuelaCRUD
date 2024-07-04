<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'codigo_docente';
    public $timestamps=false;
    protected $fillable=[
        'DNI','nombres','apellidos','direccion','estado_civil','telefono','seguro_social','departamento','fecha_registro'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'notas';
    protected $primaryKey = 'codigo_estudiante';
    public $timestamps=false;

    protected $fillable = [
        'codigo_alumno','id_capacidad','nota'
    ]; 
}

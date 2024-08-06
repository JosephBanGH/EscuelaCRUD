<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'catedras';
    protected $primaryKey = 'id_curso';
    public $timestamps=false;

    protected $fillable = [
        'id_grado','codigo_docente','periodo'
    ];

    
}
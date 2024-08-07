<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'grado';
    protected $primaryKey = 'id_grado';
    public $timestamps = false;
    protected $fillable = [
        'nivel','grado','id_seccion'
    ];
}
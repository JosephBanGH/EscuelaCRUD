<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'id_curso';
    public $timestamps = false;
    protected $fillable = [
        'nombre_curso','estado'
    ];

    public function grados()
    {
        return $this->belongsToMany(Grado::class, 'curso_grado', 'id_curso', 'id_curso');
    }
}
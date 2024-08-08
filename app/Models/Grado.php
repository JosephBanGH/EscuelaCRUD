<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $table = 'grado';
    protected $primaryKey = 'id_grado';
    public $timestamps = false;
    protected $fillable = [
        'nivel', 'grado', 'seccion', 'estado'
    ];

    public function matricula()
    {
        return $this->hasMany(Matricula::class, 'id_grado', 'id_grado');
    }

    public function cursoGrado()
    {
        return $this->hasMany(CursoGrado::class, 'id_grado', 'id_grado');
    }
}

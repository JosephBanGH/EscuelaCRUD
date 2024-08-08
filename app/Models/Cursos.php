<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    protected $table = 'curso';
    protected $primaryKey = 'id_curso';
    public $timestamps = false;
    protected $fillable = [
        'nombre_curso', 'estado', 'periodo_escolar'
    ];
    public function cursoGrado()
    {
        return $this->hasMany(CursoGrado::class, 'id_curso', 'id_curso');
    }
}

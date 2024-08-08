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
        'nombre_curso', 'estado', 'periodo_escolar','nivel'
    ];

    public function grados()
    {
<<<<<<< HEAD
        return $this->belongsToMany(Grado::class, 'curso_grado', 'id_curso', 'id_grado')
                    ->withPivot('nivel', 'periodo_escolar', 'nombre_curso');
=======
        return $this->belongsToMany(Grado::class, 'curso_grado', 'id_curso', 'id_curso');
>>>>>>> 9b77ab27bc23b6242dc0ae0d62d8bcee73d3c9ab
    }
}

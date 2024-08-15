<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoGrado extends Model
{
    protected $table = 'curso_grado';
    public $timestamps = false;
    protected $fillable = [
        'id_curso', 'id_grado', 'nivel', 'periodo_escolar', 'nombre_curso'
    ];

    //protected $primaryKey = ['id_curso', 'id_grado']; // Clave primaria compuesta
    public $incrementing = false; // Desactiva el incremento automático
    protected $keyType = 'string'; // Tipo de clave primaria
    protected $primaryKey = null;

    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'id_curso', 'id_curso');
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id_grado', 'id_grado');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegistroNotas;

class DetalleRegistro extends Model
{
    protected $table = 'detalle_registro';  // Nombre de la tabla
    public $timestamps = false;  // Si no usas timestamps
    protected $primaryKey = ['id_registronotas', 'codigo_estudiante']; // Claves primarias compuestas (aunque Eloquent maneja una sola clave primaria)

    protected $fillable = [
        'id_registronotas', 'codigo_estudiante', 'nota'
    ];

    // Relaciones
    public function registroNota()
    {
        return $this->belongsTo(RegistroNotas::class, 'id_registronotas');
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'codigo_estudiante');
    }
}

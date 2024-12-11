<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RegistroNotas extends Model
{
    use HasFactory;

    protected $table = 'registro_de_notas'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_registronotas'; // Clave primaria
    public $timestamps = false; // Si no usas timestamps, establece esto en false

    protected $fillable = [
        'id_curso',
        'id_grado',
        'codigo_docente',
        'fecha'
    ];
    public function detalleNotas()
    {
        return $this->hasMany(DetalleRegistro::class, 'id_registronotas');
    }
    public function catedra()
    {
        return $this->hasOne(Catedra::class, 'id_curso', 'id_curso')
                    ->where('id_grado', $this->id_grado)
                    ->where('codigo_docente', $this->codigo_docente);
    }

    public function personal(){
        return $this->hasOne(Personal::class,'codigo_docente','codigo_docente');
    }

    public function curso(){
        return $this->hasOne(Cursos::class,'id_curso','id_curso');
    }

    public function grado(){
        return $this->HasOne(Grado::class,'id_grado','id_grado');
    }
    
}

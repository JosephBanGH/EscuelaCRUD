<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catedra extends Model
{
    use HasFactory;
    protected $table = 'catedras';
    protected $primaryKey = null;
    public $timestamps=false;
    protected $autoincrement=false;

    protected $fillable = [
        'codigo_docente','id_curso', 'id_grado','periodo','estado'
    ];

    public function personal(){
        return $this->hasOne(Personal::class,'codigo_docente','codigo_docente');
    }

    public function curso_grado(){
        return $this->hasMany(CursoGrado::class, 'id_curso', 'id_curso')
            ->where('id_grado', $this->id_grado);
    }
}
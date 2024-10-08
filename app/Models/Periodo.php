<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'PERIODO_ESCOLAR';
    protected $primaryKey = 'idPeriodo';
    public $timestamps = false;

    protected $fillable = [
        'inicioPeriodo',
        'finPeriodo',
        'estado'
    ];

    public function matricula(){
        return $this->hasMany(Matricula::class,'idPeriodo','idPeriodo');
    }
}

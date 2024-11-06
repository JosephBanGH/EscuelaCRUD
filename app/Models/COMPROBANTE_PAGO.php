<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class COMPROBANTE_PAGO extends Model
{
    use HasFactory;
    protected $table = 'COMPROBANTE_PAGO';
    protected $primaryKey = 'idComprobante';
    public $timestamps = false;

    protected $fillable = [
        'dniApoderado',
        'codigoEstudiante',
        'concepto',
        'monto',
        'fechaPago',
        'numOperacion',
        'urlCDP',
        'verificado'
    ];

    public function estudiante(){
        return $this->belongsTo(Alumno::class,'codigoEstudiante','codigoEstudiante');
    }

    public function apoderado(){
        return $this->belongsTo(Apoderado::class,'dniApoderado','dniApoderado');
    }
}

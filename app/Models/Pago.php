<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Esensi\Model\Contracts\CompositeKeyModelInterface;
use Esensi\Model\Traits\CompositeKeyModelTrait;


class Pago extends Model
{
    use HasFactory;
    protected $table = 'PAGO';
    protected $primaryKey = 'idPago';
    public $timestamps = false;

    protected $fillable = [
        'numMatricula',
        'concepto',
        'monto',
        'periodoPago',
        'fechaPago',
        'numOperacion',
        'verificado'
    ];

    public function matricula(){
        return $this->belongsTo(Matricula::class,'numMatricula','numMatricula');
    }

}

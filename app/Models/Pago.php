<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'PAGO';
    protected $primaryKey = ['idPago','numMatricula'];
    public $timestamps = false;

    protected $fillable = [
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    use HasFactory;
    protected $table = 'OBSERVACION';
    protected $primaryKey = 'idObservacion';
    public $timestamps = false;

    protected $fillable = [
        'observacion',
        'fechaObservacion',
        'estado',
        'idExpediente'
    ];

    public function expediente(){
        return $this->belongsTo(ExpediteAdmision::class,'idExpediente','idExpediente');
    }
}

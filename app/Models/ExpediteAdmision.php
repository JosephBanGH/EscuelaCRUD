<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpediteAdmision extends Model
{
    use HasFactory;
    protected $table = 'EXPEDIENTE_ADMISION';
    protected $primaryKey = 'idExpediente';
    public $timestamps = false;

    protected $fillable = [
        'idInteresado',
        'urlCompromiso',
        'urlCartaReferencia',
        'urlDniApoderado',
        'urlDniInteresado',
        'urlComprobanteDerechoInscripcion',
        'urlConstanciaNoAduedo',
        'urlLibretaNota',
        'urlConstanciaMatriculaColegioAnterio',
        'idEstadoExpediente'
    ];


    public function interesado(){
        return $this->belongsTo(Interesado::class,'idInteresado','idInteresado');
    }

    public function observacion(){
        return $this->hasMany(Observacion::class,'idExpediente','idExpediente');
    }
}

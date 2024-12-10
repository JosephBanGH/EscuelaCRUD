<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoExpediente extends Model
{
    use HasFactory;
    protected $table = 'ESTADO_EXPEDIENTE';
    protected $primaryKey = 'idEstadoExpediente';
    public $timestamps = false;

    protected $fillable = [
        'estadoExpediente'
    ];

    public function expediente(){
        return $this->hasMany(ExpediteAdmision::class,'idEstadoExpediente','idEstadoExpediente');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrevista extends Model
{
    use HasFactory;
    protected $table = 'ENTREVISTA';
    protected $primaryKey = 'idEntrevista';
    public $timestamps = false;

    protected $fillable = [
        'idInteresado',
        'fechaEntrevista',
        'nota',
        'idComiteComision'
    ];

    public function interesado(){
        return $this->belongsTo(Interesado::class,'idInteresado','idInteresado');
    }

    public function comite(){
        return $this->belongsTo(ComiteAdmision::class,'idComiteComision','idComiteComision');
    }
}

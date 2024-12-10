<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComiteAdmision extends Model
{
    use HasFactory;
    protected $table = 'COMITE_ADMISION';
    protected $primaryKey = 'idComiteComision';
    public $timestamps = false;

    protected $fillable = [
        'idPeriodo',
        'idPersonal'
    ];

    public function entrevista(){
        return $this->hasMany(Entrevista::class,'idComiteComision','idComiteComision');
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class,'idPeriodo','idPeriodo');
    }

    public function personal(){
        return $this->belongsTo(Personal::class,'idPersonal','idPersonal');
    }
}

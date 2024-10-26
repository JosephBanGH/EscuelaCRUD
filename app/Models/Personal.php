<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
    protected $primaryKey = 'idPersonal';
    public $timestamps = false;
    protected $fillable = [
        'apellido', 'nombre', 'dni', 'direccion', 'telefono', 'seguro_social', 'fechaIngreso', 'idEstadoCivil', 'idDepartamento', 'estado','email','idTipoPersonal'
    ];


    public function tipoPersonal()
    {
        return $this->belongsTo(TipoPersonal::class, 'idTipoPersonal', 'idTipoPersonal');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'idDepartamento', 'idDepartamento');
    }

    public function catedra() {
        return $this->hasMany(Catedra::class,'idPersonal','idPersonal');
    }

    public function userLogin(){
        return $this->hasOne(UserLogin::class,'idPersonal','idPersonal');
    }
}

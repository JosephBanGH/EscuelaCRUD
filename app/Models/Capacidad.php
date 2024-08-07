<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacidad extends Model
{
    use HasFactory;
    protected $table = 'capacidades';
    protected $primaryKey = 'idorden';
    public $timestamps=false;
    protected $fillable=['descripcion','abreviatura','id_curso'];
    public function curso(){
        return $this->hasMany(Producto::class,'idcapacidad','idcapacidad');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escala extends Model
{
    use HasFactory;
    protected $table = 'escala';
    protected $primaryKey = 'idEscala';
    public $timestamps=false;

    protected $fillable = [
        'escala'
    ];

    public function alumno(){
        return $this->hasMany(Alumno::class, 'idEscala', 'idEscala');
    }
}

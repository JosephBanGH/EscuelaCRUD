<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacidad extends Model
{
    protected $table = 'capacidad';
    protected $primaryKey = 'id_orden';
    public $timestamps = false;
    protected $fillable = [
        'descripcion', 'abreviatura', 'id_curso','estado'
    ];
}
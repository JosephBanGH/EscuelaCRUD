<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'seccion';
    protected $primaryKey = 'id_seccion';
    public $timestamps = false;
    protected $fillable = [
        'descripcion'
    ];
}

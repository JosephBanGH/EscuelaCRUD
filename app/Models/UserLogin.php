<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserLogin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'USER_LOGIN';
    protected $primaryKey = 'idPersonal';
    public $timestamps = false;

    protected $fillable = [
        'userLogin',
        'passwordLogin',
        'idPersonal'
    ];

    protected $hidden = [
        'passwordLogin',
    ];

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'idPersonal', 'idPersonal');
    }

    
    public function getAuthPassword(){
        return $this->passwordLogin;
    }

}

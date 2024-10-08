<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserLoginApoderado extends Authenticatable
{
    use HasFactory;

    protected $table = 'USER_LOGIN_APODERADO';
    protected $primaryKey = 'dniApoderado';
    public $timestamps = false;

    protected $fillable = [
        'dniApoderado',
        'userLogin',
        'userPassword'
    ];

    protected $hidden = [
        'userPassword',
    ];

    //Define que el password en la base de datos es 'userPassword'
    public function getAuthPassword(){
        return $this->userPassword;
    }
}

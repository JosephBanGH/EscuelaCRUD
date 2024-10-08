<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserLoginStudent extends Authenticatable
{
    use HasFactory;

    protected $table = 'USER_LOGIN_STUDENT';
    protected $primaryKey = 'codigoEstudiante';
    public $timestamps = false;

    protected $fillable = [
        'codigoEstudiante',
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

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
    //implements MustVerifyEmail //for verify email added class line
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'role'//doldurulabilir alanlar
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

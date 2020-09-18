<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    protected $fillable = [
        'name', 'username', 'email', 'password'//doldurulabilir alanlar
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','check_name'//doldurulabilir alanlar
    ];
    protected $table="category";
}

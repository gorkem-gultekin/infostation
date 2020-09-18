<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title','text','writer','is_approve','photo'//doldurulabilir alanlar
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    protected $fillable = [
        'title','text','writer','is_approve','photo'//doldurulabilir alanlar
    ];
    public function user()
    {
        return $this->hasMany('App\User','id','writer');
    }
}

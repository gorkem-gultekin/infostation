<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    protected $fillable = [
        'title','text','writer','organizer','is_approve','photo','category','search_title'//doldurulabilir alanlar
    ];
    public function user()
    {
        return $this->hasMany('App\User','id','writer');
    }
    public function edit()
    {
        return $this->hasMany('App\User','id','organizer');
    }
    public function category()
    {
        return $this->hasMany('App\Category','id','category');
    }
    protected $table="contents";
}

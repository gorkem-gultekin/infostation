<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'name','email','comment','content_id','confirming','is_approve'
    ];
    public function comment()
    {
        return $this->hasMany('App\Contents','id','content_id');
    }
    public function user()
    {
        return $this->hasMany('App\User','id','confirming');
    }
}

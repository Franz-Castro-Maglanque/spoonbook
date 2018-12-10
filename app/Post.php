<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Photo;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photos(){
        return $this->hasMany('App\Photo');
    }
}

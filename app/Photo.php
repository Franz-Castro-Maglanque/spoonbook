<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Photo extends Model
{
    public function post(){
        return $this->belongsTo('App\Post');
    }
}

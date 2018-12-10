<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PagesController extends Controller
{
    public function profile($user_id){

         $post = Post::find($user_id);
        // return $post->count();   
        return view('pages/profile')->with('posts',$post);
    }
    public function get_data(){
        return view('post/data');
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages/index');
});

Route::get('about',function(){
    return view('pages/about');
});

Route::get('post/testing','Postscontroller@franz');
Route::resource('posts','PostsController');
// Route::get('posts/create','PostsController@create');
// Route::get('posts','PostsController@index');
// Route::get('/test','PostsController@show');
// Route::get('/test/testing','PostsController@show');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

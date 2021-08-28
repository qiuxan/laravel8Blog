<?php

use Illuminate\Support\Facades\Route;

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

Route::get('posts/{post}', function ($slug) {
    $path = __DIR__ . '/../resources/posts/' . $slug . '.html';
    if (!file_exists($path)){
       return redirect('/');
    }
    $post =  cache()->remember("post.{$slug}",60, function()use ($path){

       return file_get_contents($path);
    });
    return view('post', [
        'post'=> $post
    ]);
})->where('post','[A-z-\_]+');





Route::get('/',function(){
    return view('posts');
});

Route::get('post',function(){
    return view('post',[
        'post'=>'<h1>hello world<h1>'// in the post view now $post is accessible
    ]);
});


Route::get('test',function(){
    return view('test');
});



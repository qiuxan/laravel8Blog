<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Post;
use \App\Models\Category;
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
Route::get('/posts/{post:slug}', function (Post $post) {//Post::where('slug',$post->slug)->first()


    return view('post', ['post'=> $post]);
});



Route::get('post',function(){


    return ['foo'=>'Bar'];
});
Route::get('test',function(){
    return view('test');
});

Route::get('/',function(){
//    $posts=Post::all();
    $posts=Post::with('category')->get();
    return view('posts',[
        'posts'=> $posts
    ]);
});


Route::get('/category/{category:slug}', function (Category $category) {

//    ddd();

    return view('posts', ['posts'=> $category->posts]);
});


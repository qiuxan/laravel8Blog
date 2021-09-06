<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Post;
use \App\Models\Category;
use \App\Models\User;
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
    return view('posts',[
        'posts'=> Post::latest()->get(),
        'categories'=>Category::all()

    ]);
})->name('home');


Route::get('/category/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts'=> $category->posts,
        'categories'=>Category::all(),
        'currentCategory'=>$category
    ]);
})->name('category');

Route::get('authors/{user:username}',function(User $user){
    return view('posts',[
        'posts'=>$user->posts,
        'categories'=>Category::all()
    ]);
});
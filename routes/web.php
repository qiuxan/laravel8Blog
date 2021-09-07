<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;

Route::get('/',[PostController::class,'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class,'show']);














////
//Route::get('post',function(){
//    return ['foo'=>'Bar'];
//});
//
//
//
//Route::get('authors/{user:username}',function(User $user){
//    return view('posts.index',[
//        'posts'=>$user->posts,
//        'categories'=>Category::all()
//    ]);
//});

//Route::get('test',function(){
//    return view('test');
//});

//
//Route::get('/category/{category:slug}', function (Category $category) {
//    return view('posts', [
//        'posts'=> $category->posts,
//        'categories'=>Category::all(),
//        'currentCategory'=>$category
//    ]);
//})->name('category');
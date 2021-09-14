<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\SessionsController;
use \App\Http\Controllers\PostCommentController;
use \App\Http\Controllers\NewsletterController;
use \App\Services\Newsletter;
use \Illuminate\Validation\ValidationException;

Route::post('newsletter', NewsletterController::class);

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentController::class, 'store']);


Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');

Route::post('/sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create',[PostController::class,'create'])->middleware('admin');

Route::post('admin/posts',[PostController::class,'store'])->middleware('admin');







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
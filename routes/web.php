<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\AdminPostController;
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





Route::get('admin/posts/create',[AdminPostController::class,'create'])->middleware('admin');

Route::post('admin/posts',[AdminPostController::class,'store'])->middleware('admin');



Route::get('admin/posts/',[AdminPostController::class,'index'])->middleware('admin');


Route::get('admin/posts/{post}/edit',[AdminPostController::class,'edit'])->middleware('admin');

Route::patch('admin/posts/{post}',[AdminPostController::class,'update'])->middleware('admin');

Route::delete('admin/posts/{post}',[AdminPostController::class,'destroy'])->middleware('admin');


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
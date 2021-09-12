<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\SessionsController;
use \App\Http\Controllers\PostCommentController;

Route::get('ping',function (){

//    require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us5'
    ]);



    $response = $mailchimp->lists->addListMember('fa6e3a67d8', [
        "email_address" => "qiuxan@qq.com",
        "status" => "subscribed",
    ]);


//    $response = $mailchimp->ping->get();


    ddd($response);

});

Route::get('/',[PostController::class,'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class,'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentController::class,'store']);


Route::get('/register',[RegisterController::class,'register'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');

Route::get('/login',[SessionsController::class,'create'])->middleware('guest');

Route::post('/sessions',[SessionsController::class,'store'])->middleware('guest');

Route::post('/logout',[SessionsController::class,'destroy'])->middleware('auth');









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
<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
Route::get('/posts/{post}', function ($slug) {
    return view('post', ['post'=> Post::find($slug)]);
})->where('post','[A-z-\_]+');



Route::get('post',function(){


    return ['foo'=>'Bar'];
});
Route::get('test',function(){
    return view('test');
});

Route::get('/',function(){

    $files=File::files(resource_path('/posts'));

    $posts=collect($files)->map(function($file){
        $document=YamlFrontMatter::parseFile($file);
        return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $file->getFilenameWithoutExtension());
    });
    
    return view('posts',[
        'posts'=> $posts
    ]);
});


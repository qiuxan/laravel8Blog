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
//    return view('post',[
//        'post'=>'<h1>hello world<h1>'// in the post view now $post is accessible
//    ]);

    return ['foo'=>'Bar'];
});
Route::get('test',function(){
    return view('test');
});






















Route::get('/',function(){

    $files=File::files(resource_path('/posts'));
//    ddd($files[0]->getFilenameWithoutExtension());
    $posts=[];

    $posts=collect($files)->map(function($file){
        $document=YamlFrontMatter::parseFile($file);
        return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $file->getFilenameWithoutExtension());
    });

//    $posts=array_map(function ($file){
//        $document=YamlFrontMatter::parseFile($file);
//        return new Post(
//            $document->title,
//            $document->excerpt,
//            $document->date,
//            $document->body(),
//            $file->getFilenameWithoutExtension()
//        );
//    },$files);
//    $documents=[];

//    foreach ($files as $file){
////        $documents[]=YamlFrontMatter::parseFile($file);
//        $document=YamlFrontMatter::parseFile($file);
//
////        ddd($document);
////        dd($document->title);
//        $posts[]=new Post(
//            $document->title,
//            $document->excerpt,
//            $document->date,
//            $document->body(),
//            $file->getFilenameWithoutExtension()
//        );
//    }



//    ddd($posts[0]->slug);




//    $document= YamlFrontMatter::parseFile(resource_path('/posts/my-first-post.html'));

//    ddd($document->matter('title'));







//    $posts=Post::all();
//
    return view('posts',[
        'posts'=> $posts
    ]);
});


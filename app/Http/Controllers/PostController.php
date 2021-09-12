<?php

namespace App\Http\Controllers;
use \App\Models\Post;
use \App\Models\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
//        dd();
        return view('posts.index',[
            'posts'=> Post::latest()->filter(request(['search','category','author']))->paginate(9),
            'categories'=>Category::all(),

        ]);
    }

    public function show(Post $post){

//            return $post->comments[0]->author;
            return view('posts.show', ['post'=> $post]);
    }


}

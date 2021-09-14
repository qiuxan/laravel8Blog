<?php

namespace App\Http\Controllers;

use \App\Models\Post;
use \App\Models\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
//        dd();
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(9),
            'categories' => Category::all(),

        ]);
    }

    public function show(Post $post)
    {

//            return $post->comments[0]->author;
        return view('posts.show', ['post' => $post]);
    }

    public function create(Post $post)
    {


        return view('posts.create', [
//            'categories'=>Category::all(),
        ]);
    }

    public function store()
    {

        request()->validate([
            'category' => 'required',
            'excerpt' =>'required|min:3' ,
            'body' => 'required|min:3',
            'title'=>'required|min:3|unique:posts,title',
        ]);

//        ddd();


//        return request();

        Post::create(
            [
                'user_id' => auth()->id(),
                'category_id' => request('category'),
                'excerpt' => request('excerpt'),
                'body' => request('body'),
                'title'=>request('title'),
                'slug'=>$this->createSlug(request('title'))
            ]
        );

        return redirect('/');


    }


    public static function createSlug($str, $delimiter = '-'){

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;

    }

}

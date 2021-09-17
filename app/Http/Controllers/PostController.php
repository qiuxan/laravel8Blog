<?php

namespace App\Http\Controllers;

use \App\Models\Post;
use \App\Models\Category;

use Illuminate\Http\Request;


use Illuminate\Support\Str;

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






    public static function createSlug($str, $delimiter = '-')
    {

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;

    }

}

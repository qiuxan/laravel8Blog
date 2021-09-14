<?php

namespace App\Http\Controllers;

use \App\Models\Post;
use \App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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

    public function create(Post $post)
    {


        return view('posts.create', [
//            'categories'=>Category::all(),
        ]);
    }

    public function store()
    {


        $attributes = request()->all();
        $attributes['slug'] = \Str::slug($attributes['title']);
        $validator = Validator::make($attributes, [
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors()->messages();
            if (array_key_exists('slug', $messages)) {
                $msg = $messages['slug'];
                if (in_array("The slug has already been taken.", $msg)) {
                    $id = array_search("The slug has already been taken.", $msg);
                    $messages['slug'][$id] = "The title has already been taken.";
                };
            }
            return redirect()->back()->withInput()->withErrors($messages);
        }
        $attributes['user_id'] = auth()->id();
        unset($attributes['_token']);
        $post = Post::create($attributes);
        return redirect('/posts/' . $post->slug);


//        $attributes=request()->all();
//        $slug=Str::slug('title');
//        $attributes['slug']=$slug;
//
//
//        $attributes=request()->validate([
//            'category_id' => ['required',Rule::exists('categories','id')],
//            'excerpt' =>'required|min:3' ,
//            'body' => 'required|min:3',
//            'title'=>'required|min:3|unique:posts,title',
//        ]);
//
////        ddd();
//
//
//
//
//        $attributes['user_id']=auth()->id();
//
////        try {
////
////            Post::create($attributes);
////
////        }catch (Exception $e) {
////            return back()->withErrors($attributes,'title');
////        }
////
//
//
//
////        return request();
//
////        Post::create(
////            [
////                'user_id' => auth()->id(),
////                'category_id' => request('category_id'),
////                'excerpt' => request('excerpt'),
////                'body' => request('body'),
////                'title'=>request('title'),
////                'slug'=>$slug
////            ]
////        );
//
//        return redirect('/');


    }


    public static function createSlug($str, $delimiter = '-')
    {

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    //

    public function store()
    {


//        return $path;
//        ddd(request()->file('thumbnail'));
//        ddd(request()->all());

        $attributes = request()->all();
        $attributes['slug'] = \Str::slug($attributes['title']);
        $validator = Validator::make($attributes, [
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'thumbnail'=>'required|image'
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


        $path=request()->file('thumbnail')->store('thumbnails');
        $attributes['thumbnail']=$path;
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

    public function create()
    {


        return view('posts.create', [
//            'categories'=>Category::all(),
        ]);
    }

    public function index()
    {
        return view('admin/posts.index',[
            'posts'=>Post::paginate(50),
        ]);
    }

    public function edit(Post $post){

        return view('admin.posts.edit',[
            'post'=>$post
        ]);

    }

    public function update(Post $post){

        $attributes = request()->all();
        $attributes['slug'] = \Str::slug($attributes['title']);
        $validator = Validator::make($attributes, [
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'thumbnail'=>'image'
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


        if (request()->file('thumbnail')){
            $path=request()->file('thumbnail')->store('thumbnails');
            $attributes['thumbnail']=$path;
        }



        $post->update($attributes);

        return back()->with('success', 'Post Updated!');

    }

    public function destroy(Post $post){

        $post->delete();
        return back()->with('success', 'Post Deleted!');

    }

}

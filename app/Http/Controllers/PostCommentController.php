<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    //

    public function store(Post $post){

//        dd(request());


        request()->validate(
            ['body'=>'required|min:7'],
            [
                'body.required'=>'Comment cannot be empty.',
                'body.min:7'=>'Comment should be more than 7 letters.'

        ]);


        $post->comments()->create([

            'user_id'=>request()->user()->id,
            'body'=>request('body')

        ]);

        return back();

    }
}

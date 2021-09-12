<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(){


        $attributes=request()->validate([
            'body'=>'required|min:7'
        ]);




        return request()->all();

    }
    public function messages()
    {
        return [
            'body.required' => 'A message is required',
        ];
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function register(){
        return view('register.create');
    }

    public function store(){

        $attributes=request()->validate([
            'name'=>'required|max:225',
            'username'=>'required|max:225|min:3',
            'email'=>'required|email|max:225',
            'password'=>'required|min:7|max:225'
        ]);

//        $attributes['password']=bcrypt($attributes['password']);

        User::create($attributes);
        return redirect('/');
    }
}

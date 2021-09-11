<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    //
    public function destroy(){

        auth()->logout();
        return redirect('/')->with('success','Goodbye!');

    }
    public function create(){
//        return "hello session create";
        return view('sessions.create');
    }

    public function store(){
//        return request()->all();

        $attributes=request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if (!auth()->attempt($attributes)){

            throw ValidationException::withMessages(['email'=>'You provided credentials could not be verified.']);//same as below
        }
        session()->regenerate();

        return redirect('/')->with('success','Welcome Back');

//        return back()
//            ->withInput()
//            ->withErrors(['email'=>'You provided credentials could not be verified.']);
    }
}

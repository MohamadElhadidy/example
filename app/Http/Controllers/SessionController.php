<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        //validate
        $attributes = request()->validate([
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);
        //login
        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => "Sorry, that credentials doesn't match"
            ]);
        }

        request()->session()->regenerate();

        return redirect('/jobs');
    }

    public function destroy()
    {
       Auth::logout();
       return redirect('/');
    }
}

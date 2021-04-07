<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function plogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password')))
        {
            return redirect('/dashboard');
        }

        $notification = array(
            'message' => 'Oops! Tidak bisa menemukan User', 
            'alert-type' => 'error'
        );
        return redirect('/login')->with($notification);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        if(auth()->check())
        {
            return redirect()->route('home');
        }
        return view('auth.login');
    }
    public function postLoginAdmin(Request $request){
        // dd($request->has('remember-me'));
        $credentials =  $request->only('email', 'password');
        // dd($credentials);
        $remember = $request->has('remember-me') ? true : false;
        if(auth()->attempt($credentials,$remember)){
            return redirect()->route('home');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}

<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;

class AuthController extends BaseController
{
    public function index(Request $request)
    {
        if( \Auth::attempt($request->only(['email', 'password'])) )
        {
            return redirect('/')
                ->with('message', 'Welcome back ' . \Auth::user()->firstname) . '!';
        } else {
            return redirect('login')
                ->with('error', 'Invalid login credentials')
                ->withInput();
        }
    }

    public function login()
    {
        return view('auth/login');
    }

    public function oauth($service)
    {
        return \Socialite::driver($service)->redirect();
    }

    public function oauthCallback(Request $request, $service)
    {
        dd($request->all());
    }

    public function signup()
    {
        return view('auth/signup');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/')->with('message', 'You have logged out');
    }
}
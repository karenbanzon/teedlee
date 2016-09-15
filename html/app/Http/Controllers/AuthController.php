<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\Providers\AuthWrapperProvider as Auth;
use Teedlee\Models\SocialAccount;
use Socialite;

class AuthController extends BaseController
{
    public function index(Request $request)
    {
        if( Auth::attempt($request->only(['email', 'password'])) )
        {
            $route = $request->get('redirect') ?: '/';
            return redirect($route)
                ->with('message', 'Welcome back ' . (\Auth::user()->firstname ?: \Auth::user()->email) . '!');
        } else {
            return redirect('login')
                ->with('error', 'Invalid login credentials')
                ->withInput();
        }
    }

    public function login(Request $request)
    {
        return view('auth/login')
            ->with('redirect', $request->get('redirect'));
    }

    public function oauth($service)
    {
        if($service=='facebook') {
            $fields = ['first_name', 'last_name', 'email', 'gender',];
        }

        return \Socialite::driver($service)
            ->fields($fields)
            ->redirect();
    }


    public function oauthCallback($service_name)
    {
        $service = new SocialAccount();
        $user = $service->createOrGetUser(Socialite::driver($service_name)->user(), $service_name);
        auth()->login($user);
        return redirect()->to('/')->with('message', 'Logged in via ' . $service_name);
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
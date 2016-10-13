<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\Providers\AuthWrapperProvider as Auth;
use Teedlee\Models\SocialAccount;
use Teedlee\User;
use Socialite;

class AuthController extends BaseController
{
    public function index(Request $request)
    {
        $field = (strpos($request->email, '@') !== false) ? 'email' : 'username';

        if( \Auth::attempt([
            $field => $request->email,
            'password' => $request->password
        ]))
        {
            if( $request->get('redirect') ) {
                $route = $request->get('redirect');

            } else if( (\Auth::user()->user_group->id==1) ) {
                $route = 'admin';

            } else if( (\Auth::user()->user_group->id==7) ) {
                $route = 'vote';

            } else {
                $route = '/';
            }

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

    public function recover(Request $request)
    {
        if( $request->all() ) {
            if( $user = User::where('email', $request->email)->first() )
            {
                $user->link = url('recover/'.$user->id.'/'.sha1($user->email.$user->id));
                \Mail::send("auth.email.recover", $user->toArray(), function ($m) use ($user) {
                    $m->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
                    $m->to($user->email, $user->username)->subject('Password recovery');
                });
            }
            return view('auth.recover_sent');
        } else {
            return view('auth.recover');
        }
    }

    public function change(Request $request, User $user, $hash)
    {
        if( $data = $request->all() ){
            $validator = \Validator::make($request->all(), [ 'password' => 'required|confirmed|min:6' ]);
            if( $validator->fails() ) {
                return redirect(\Request::url())->withErrors($validator);

            } else {
                $user->password = bcrypt($request->password);
                $user->save();
                return redirect('login')->with('message', 'Password successfully changed');
            }

        } else {
            if( sha1($user->email.$user->id) == $hash )
            {
                return view('auth.change');
            } else {
                abort(500, 'Invalid hash');
            }
        }
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
<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\User;
use Teedlee\Http\Requests\CreateUser;

class UserController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
        parent::__construct();
    }

    public function index()
    {
        return view('user/index');
    }

    public function create(CreateUser $request)
    {
        $request = array_merge(
            $request->except('_token', 'password_confirmation'),
            [
                'user_group_id' => 5,
                'city_id' => 1,
                'province_id' => 1,
                'status' => 'inactive',
            ]
        );
        $request['password'] = \Hash::make($request['password']);
        $user = $this->model->create($request);
        $this->send_activation_email($user);
        return redirect('')->with('message', 'Activation email sent to '.$user->email.'.');
    }

    public function send_activation_email(User $user)
    {
        $user->link = url('user/activate/'.$user->id.'/'.sha1($user->email.$user->username));
        \Mail::send('user.email.activation', $user->toArray(), function ($m) use ($user) {
            $m->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
            $m->to($user->email, $user->username)->subject('Account activation');
        });
    }

    public function activate(User $user, $token)
    {
//        dd($user->toArray());
        if( sha1($user->email.$user->username)==$token && $user->status != 'inactive') {
            return redirect('')->with('error', 'Invalid activation link');
        } else if( sha1($user->email.$user->username)==$token )
        {
            $user->status='active';
            $user->save();
            return redirect('login')->with('message', 'Your account has been activated. You can now log in.');
        } else {
            return redirect('')->with('error', 'Activation token is invalid');
        }
    }

    public function profile()
    {
        return view('user/profile');
    }

    public function submissions()
    {
        return view('user/submissions');
    }

    public function sales()
    {
        return view('user/sales');
    }
}

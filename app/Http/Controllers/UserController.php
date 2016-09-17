<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\User;
use Teedlee\Http\Requests\CreateUser;
use Teedlee\Http\Requests\UpdateUser;

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
        return view('user/index')
            ->with('user', \Auth::user())
            ;
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
        mkdir(public_path('users'.DIRECTORY_SEPARATOR.$user->id), 0775);
        $this->send_activation_email($user);
        return redirect('')->with('message', 'Activation email sent to '.$user->email.'.');
    }

    public function update(UpdateUser $data)
    {
        $user = $this->model->find(\Auth::user()->id);
        $data = array_merge($user->toArray(), $data->toArray());
        $data['is_profile_complete']=1;

        if( $avatar = \Request::file('avatar') )
        {
            $filename = 'avatar.'.$avatar->getClientOriginalExtension();
            $avatar->move(public_path('users'.DIRECTORY_SEPARATOR.$user->id), $filename);
            $data['avatar'] = url('users/'.$user->id.'/'.$filename);
        }

        unset($data['_token']);
        $user->where('id', \Auth::user()->id)->update($data);
        return redirect()->back()->with('message', 'Profile successfully updated');
    }

    public function send_activation_email(User $user)
    {
        $user->link = secure_url('user/activate/'.$user->id.'/'.sha1($user->email.$user->username));
        \Mail::send('user.email.activation', $user->toArray(), function ($m) use ($user) {
            $m->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
            $m->to($user->email, $user->username)->subject('Account activation');
        });
    }

    public function activate(User $user, $token)
    {
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

    public function submissions()
    {
        return view('user/submissions')
            ->with('submissions', \Teedlee\User::find(\Auth::user()->id)->submissions_grouped())
            ;
    }

    public function artwork(Request $request, \Teedlee\Models\Submission $submission)
    {

        if( $file = \Request::file('artwork') )
        {
            $filename = $submission->id.'.orig.psd';
            $file->move(public_path('users'.DIRECTORY_SEPARATOR.\Auth::user()->id), $filename);
            $submission->status = 'submitted_orig_artwork';
            $submission->save();
        }

        return redirect('user/submissions');
    }

    public function sales()
    {
        return view('user/sales');
    }
}

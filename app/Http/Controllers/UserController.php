<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\User;
use Teedlee\Http\Requests\CreateUser;
use Teedlee\Http\Requests\UpdateUser;
use Teedlee\Providers\ShopifyServiceProvider;

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
        $redir = session('redirect');
        $request->session()->forget('redirect');

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
        $path = public_path('users'.DIRECTORY_SEPARATOR.$user->id);
        if(!is_dir($path)) { mkdir($path, 0775); }
        $this->send_activation_email($user, $redir);
        return redirect('user/welcome');
    }

    public function welcome()
    {
        return view('user.welcome');
    }

    public function update(UpdateUser $data)
    {
        $user = $this->model->find(\Auth::user()->id);
        $data = array_merge($user->toArray(), $data->toArray());
        $data['is_profile_complete']=1;
        unset($data['user_group']);
        unset($data['_token']);
        unset($data['created_at']);
        unset($data['updated_at']);

        if( $avatar = \Request::file('avatar') )
        {
            $filename = 'avatar.'.$avatar->getClientOriginalExtension();
            $avatar->move(public_path('users'.DIRECTORY_SEPARATOR.$user->id), $filename);
            $data['avatar'] = url('users/'.$user->id.'/'.$filename);
        }

        if( $data['password'] ) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        unset($data['password_confirmation']);
        unset($data['_token']);

        $user->where('id', \Auth::user()->id)->update($data);
        return redirect()->back()->with('message', 'Profile successfully updated');
    }

    public function show($user)
    {
        return view('user/show')
            ->with('user', $user);
    }

    public function send_activation_email(User $user, $redir=null)
    {

        $user->link = secure_url('user/activate/'.$user->id.'/'.sha1($user->email.$user->username));
        $user->link .= $redir ? '?redirect='.$redir : null;
        \Mail::send('user.email.activation', $user->toArray(), function ($m) use ($user) {
            $m->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
            $m->to($user->email, $user->username)->subject('Account activation');
        });
    }

    public function activate(User $user, $token, Request $request)
    {
        if( sha1($user->email.$user->username)==$token && $user->status != 'inactive') {
            return redirect('')->with('error', 'Invalid activation link');
        } else if( sha1($user->email.$user->username)==$token )
        {
            $user->status='active';
            $user->save();
            \Auth::login($user);
            return redirect()->to($request->redirect ?: 'login')->with('message', 'Your account has been activated.');
        } else {
            return redirect('/')->with('error', 'Activation token is invalid');
        }
    }

    public function submissions()
    {
        return view('user/submissions')
            ->with('submissions', \Teedlee\User::find(\Auth::user()->id)->submissions_grouped())
            ;
    }

    public function entries()
    {
        return view('user/entries')
            ->with('entries', \Teedlee\User::find(\Auth::user()->id)->entries()->where('status', '!=', 'draft')->get())
            ;
    }

    public function artwork(Request $request, \Teedlee\Models\Submission $submission)
    {
        $request->request->add([
            'id' => $submission->id,
            'status' => 'orig_artwork_submitted'
        ]);
        
        $this->validate($request, $submission->rules('artwork'));
        
        if ($file = \Request::file('artwork')) {
            $filename = $submission->id . '.orig.'.$file->extension();
            $file->move(public_path('users' . DIRECTORY_SEPARATOR . \Auth::user()->id), $filename);
            $submission->status = $request->status;
            $submission->save();
        }

        return redirect('user/submissions');
    }

    public function sales()
    {
        $submissions = (new ShopifyServiceProvider(new \Oseintow\Shopify\Facades\Shopify()))->submission_sales();
        return view('user/sales')
            ->with('submissions', $submissions)
            ->with('total_quantity', 0)
            ->with('total_sales', 0)
            ;
    }
}

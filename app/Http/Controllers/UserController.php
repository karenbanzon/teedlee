<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;

class UserController extends BaseController
{
    public function index()
    {
        return view('user/index');
    }

    public function profile()
    {
        return view('user/profile');
    }

    public function submissions()
    {
        return view('user/submissions');
    }
}

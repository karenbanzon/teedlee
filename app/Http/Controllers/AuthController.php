<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function signup()
{
    return view('auth/signup');
}
}
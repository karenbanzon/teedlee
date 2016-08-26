<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;

class BaseController extends Controller
{
    function __construct()
    {
        if( \Auth::check() && \Session::get('errors')==null && !session('message') && !session('errors') && !\Auth::user()->is_profile_complete)
        {
            \Request::session()->flash('message', 'Complete <a href="'.secure_url('user').'">your profile</a> to enable access to all features.');
        }
    }
}
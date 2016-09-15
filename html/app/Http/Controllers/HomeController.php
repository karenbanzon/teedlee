<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;

class HomeController extends BaseController
{
    public function index()
    {
        return view('home/index');
    }
}
<?php

namespace Teedlee\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Teedlee\Http\Requests;
use Teedlee\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}

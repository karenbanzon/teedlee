<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }
}
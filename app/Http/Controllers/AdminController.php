<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Resource;
use Teedlee\Http\Requests;

class AdminController extends BaseController
{
    public function index()
    {
        return view('admin.index');
    }
}
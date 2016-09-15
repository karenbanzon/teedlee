<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;

use Teedlee\Http\Requests;

class UtilsController extends Controller
{
    public function dev_deploy()
    {
        dd(shell_exec('sudo devdeploy.sh'));
    }
}
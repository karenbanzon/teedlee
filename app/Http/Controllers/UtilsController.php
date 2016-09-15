<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;

use Teedlee\Http\Requests;

class UtilsController extends BaseController
{
    public function dev_deploy()
    {
        return shell_exec('timeout 999999999s sudo devdeploy.sh');
    }
}
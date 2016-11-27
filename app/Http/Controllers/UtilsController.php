<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;

class UtilsController extends BaseController
{
    public function dev_deploy()
    {
        $proc = popen('sudo devdeploy.sh', 'r');
        echo '<pre>';
        while (!feof($proc))
        {
            echo fread($proc, 4096);
            @ flush();
        }
        echo '</pre>';
    }

    public function searchAndExpire()
    {
        (new \Teedlee\Models\Submission())->searchAndExpire();
    }

    public function searchAndUpdate()
    {
        (new \Teedlee\Models\Contest())->searchAndUpdate();
        (new \Teedlee\Models\Entry())->searchAndUpdate();
    }
}
<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Carbon\Carbon;

class UtilController extends Controller
{
    public function housekeeping()
    {
        $this->removeExpiredDraftSubmissions();
    }

    public function removeExpiredDraftSubmissions()
    {
        \Teedlee\Models\Submission::
            where('status', 'draft')
            ->where('created_at', '<=', Carbon::now()->addHour(-1) )
            ->delete()
        ;
    }
}

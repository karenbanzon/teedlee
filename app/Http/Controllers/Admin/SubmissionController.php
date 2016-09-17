<?php

namespace Teedlee\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Teedlee\Http\Requests;
use Teedlee\Http\Controllers\Controller;

class SubmissionController extends Controller
{
    public function index()
    {
        return view('admin.submission.index');
    }

    public function byStatus($submissions)
    {
        return view('admin.submission.index')
            ->with('title', $submissions->count() > 0 ? $submissions->first()->shop_status : 'All')
            ->with('submissions', $submissions);
    }
}

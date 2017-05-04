<?php

namespace Teedlee\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use Teedlee\Http\Requests;
use Teedlee\Http\Controllers\Controller;
use Teedlee\Models\Submission;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.submission.index');
    }

    /**
     * Set link to Shopify product
     * @param  \Teedlee\Models\Submission $submissions
     * @return \Illuminate\Http\Response
     */
    public function shopify_link(Request $request, Submission $submission)
    {
        $submission->shopify_link = $request->shopify_link;
        $submission->slug = str_replace([env('SHOP_URL'), '/'], null, trim($request->shopify_link));
        $submission->save();
        return redirect()->back()->with('message', 'Shopify link successfully set for this item.');
    }

    /**
     * Display a listing of the resource by status.
     * @param  Collection $submissions
     * @return \Illuminate\Http\Response
     */
    public function byStatus(Collection $submissions)
    {
        return view('admin.submission.index')
            ->with('title', $submissions->count() > 0 ? title_case(str_replace('_', ' ', $submissions->first()->status)) : 'All')
            ->with('submissions', $submissions);
    }

    /**
     * Display a listing of the resource by status.
     * @param  Collection $submissions
     * @return \Illuminate\Http\Response
     */
    public function byShopStatus(Collection $submissions)
    {
        return view('admin.submission.index')
            ->with('title', $submissions->count() > 0 ? title_case(str_replace('_', ' ', $submissions->first()->status)) : 'All')
            ->with('submissions', $submissions);
    }

    /**
     * Set status
     *
     * @return \Illuminate\Http\Response
     */
    public function promote(Request $request, Submission $submission, $status)
    {
        $now = Carbon::now();
        $submission->status = $status;
        $notify = false;

        if ($status == 'internal_voting') {
            $submission->internal_voting_start = $now;

        } else if ($status == 'internal_voting_fail') {
            $notify = true;
            $title = 'Your submission was declined';
            $submission->declined_reason = $request->declined_reason;

        } else if ($status == 'public_voting') {
            $notify = true;
            $title = 'Your design has been approved for Public Voting!';
            $submission->public_voting_start = $now;

        } else if ($status == 'awaiting_orig_artwork') {
            $notify = true;
            $title = 'Your submission was approved!';

        } elseif ($status == 'orig_artwork_declined') {
            $notify = true;
            $title = 'Your artwork was declined';
            $submission->declined_reason = $request->declined_reason;

        } elseif ($status == 'publication') {
            $notify = true;
            $title = 'Your design has been published!';
        }

        if( $notify )
        {
            $user = \Auth::user();
            \Mail::send("admin.submission.email.$status", ['submission' => $submission, 'user' => $user], function ($m) use ($submission, $title, $user) {
                $m->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
                $m->to($submission->user->email, $submission->user->username)->subject($title);
            });
        }

        $submission->save();
        return redirect()->back();
    }

    public function expire( $submission, $type )
    {
        $now = Carbon::now()->subDays(8);

        if( $type == 'internal' )
        {
            $internal = $submission->internal_voting_start;
            $submission->internal_voting_start = $now;
            $submission->save();
            $submission->searchAndExpire();
            $submission->internal_voting_start = $internal;
        } else {
            $public = $submission->public_voting_start;
            $submission->public_voting_start = $now;
            $submission->save();
            $submission->searchAndExpire();
            $submission->public_voting_start = $public;
        }

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        return view('admin.submission.edit')
            ->with('submission', $submission)
            ->with('flags', $submission->flags()->count())
            ->with('has_voted', false)
            ->with('rating', 0)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

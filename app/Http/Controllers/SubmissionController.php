<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use \Teedlee\Models\Submission;
use Carbon\Carbon;

class SubmissionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('submission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        TODO: Move this to store() method

        $submission = new Submission();
        return $this->edit($submission->create([
            'user_id' => \Auth::user()->id,
            'title' => ' ',
            'description' => ' ',
            'status' => 'draft',
            'tags' => ' ',
            'price' => 0,
            'created_at' => Carbon::now()->toDateTimeString()
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($submission)
    {
        return view('submission.create')->with('submission', $submission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $submission)
    {
        $new = $submission->status == 'draft';
        $submission->title = $request->title;
        $submission->status = 'submitted';
        $submission->save();
        $submission = $submission->toArray();

        if( $new  )
        {
            $submission['link'] = secure_url('user/submissions');
            \Mail::send('user.email.submit', $submission, function ($m) use ($submission) {
                $m->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
                $m->to($submission['user']['email'], $submission['user']['username'])->subject('You submitted a design');
            });
        }

        return redirect('user/submissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destroy');
    }
}

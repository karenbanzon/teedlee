<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Models\Contest;
use Teedlee\Models\Entry;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if( count($submission->images) < 1 ) {
            return redirect('submissions/'.$submission->id.'/edit')->with('error', 'Upload at least 1 design image.')->withInput();
        }

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
    public function edit($id)
    {
        //
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


    /**
     * Show the form for submitting a new entry for the specified contest.
     *
     * @param  \Teedlee\Models\Contest $contest
     * @return \Illuminate\Http\Response
     */
    public function submit(Contest $contest)
    {
        return view('entry/submit')
            ->with('contest', $contest)
            ->with('entry', (new Entry())->create([
                'title' => ' ',
                'contest_id' => $contest->id,
            ]));
    }
}

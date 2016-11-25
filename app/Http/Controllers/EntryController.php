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
    public function edit(Entry $entry)
    {
        return view('entry/submit')
            ->with('entry', $entry)
            ->with('contest', Contest::find($entry->contest_id))
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        $contest = Contest::find($entry->contest_id);

        if( count($entry->images) < 1 ) {
            return redirect('entries/'.$entry->id.'/edit')->with('error', 'Upload at least 1 design image.')->withInput();
        }

        $new = $entry->status == 'draft';
        $entry->title = $request->title;
        $entry->status = 'submitted';
        $entry->save();
        $entry = $entry->toArray();

        if( $new  )
        {
            $entry['link'] = secure_url('user/submissions');
            \Mail::send('user.email.submit', $entry, function ($m) use ($entry, $contest) {
                $m->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
                $m->to(\Auth::user()->email, \Auth::user()->username)->subject("You submitted a design to the contest '" . $contest->title . "''" );
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
        $entry =  (new Entry())->create([
            'title' => ' ',
            'contest_id' => $contest->id,
        ]);

        return $this->edit($entry);
    }
}

<?php

namespace Teedlee\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Teedlee\Http\Controllers\Controller;
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
//        dd($request->all());

        if( $request->winner ) {
            
            $contest = Contest::find($request->contest_id);
            $contest->status = 'closed';
            $contest->save();
            $contest->entries()->whereNotIn('id', $request->winner)->update(['is_winner' => false]);
            $contest->entries()->whereIn('id', $request->winner)->update(['is_winner' => true]);
            
            $subject = $contest->title.': Congratulations! You have won the contest!';
            $template = 'entry.email.winner';
//            $entries = $contest->entries()->where('status','<>','draft')->with('user')->get();
            
            foreach( $contest->winners as $entry )
            {
                $user = $entry->user;
                \Mail::send($template, ['contest' => $contest, 'entry' => $entry, 'user' => $user, 'subject' => $subject], function ($m) use ($user, $subject) {
                    $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                    $m->to($user->email, $user->username)->subject($subject);
                });
            }
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['Choose at least one entry to declare as winner.']);
        }
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
        return view('admin/entries/edit')
            ->with('entry', $entry)
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
//        dd($request->all());

        $data = $request->all();
        $entry->update($data);
        
        if( $data->status == 'public_voting' )
        {
            $entry['link'] = secure_url('user/submissions');
            \Mail::send('entry.email.public_voting', $entry, function ($m) use ($entry, $contest) {
                $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $m->to(\Auth::user()->email, \Auth::user()->username)->subject($contest->title . ": : Your design for has been approved for Public Voting!" );
            });            
        }
        
        (new Entry())->searchAndUpdate();

        return redirect()->back();
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

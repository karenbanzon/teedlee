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

//        Announce winners
        $contest = Contest::find($request->contest_id);
        $contest->status = 'closed';
        $contest->save();

        $entries = $contest->entries()->whereNotIn('id', $request->winner)->update(['is_winner' => false]);
        $entries = $contest->entries()->whereIn('id', $request->winner)->update(['is_winner' => true]);

        return redirect()->back();
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
        dd('update');
        $data = $request->all();
        $entry->update($data);
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

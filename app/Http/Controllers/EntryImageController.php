<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;

class EntryImageController extends Controller
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
        if( $file = $request->file('file') )
        {
            $filename = $request->get('entry_id').'.'.$file->getClientOriginalExtension();
            $path = public_path('contests'.DIRECTORY_SEPARATOR.$request->id);
            $file->move($path, $filename);
            $image = new \Teedlee\Models\EntryImage();
            $image->entry_id = $request->get('entry_id');
            $image->path = url('users/'.\Auth::user()->id.'/'.$filename);
            $image->description = ' ';
            $image->save();

            $entry = (new \Teedlee\Models\entry())->find($request->get('entry_id'));
            return response()->json($image);
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
}
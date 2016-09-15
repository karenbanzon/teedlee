<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;

use Teedlee\Http\Requests;

class SubmissionImageController extends Controller
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
            $filename = $request->get('submission_id').'.'.$file->getClientOriginalExtension();
            $path = public_path('users'.DIRECTORY_SEPARATOR.\Auth::user()->id);
            $file->move($path, $filename);
            $image = new \Teedlee\Models\SubmissionImage();
            $image->submission_id = $request->get('submission_id');
            $image->path = url('users/'.\Auth::user()->id.'/'.$filename);
            $image->description = ' ';
            $image->save();

            $submission = (new \Teedlee\Models\Submission())->find($request->get('submission_id'));
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
    public function update(Request $request, $submission)
    {
        dd($submission);
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

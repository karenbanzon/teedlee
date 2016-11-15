<?php

namespace Teedlee\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Teedlee\Http\Controllers\Controller;
use Teedlee\Models\Contest;
use Teedlee\Http\Requests\SaveContest;
use Teedlee\Models\Order;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/contest/index')
            ->with('contests', Contest::all())
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->edit(new Contest());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveContest $request)
    {
        $contest = Contest::findOrNew($request->id);

        if( $file = $request->file('banner') )
        {
            $filename = str_slug($request->title) . '-' . $request->id.'.'.$file->getClientOriginalExtension();
            $path = public_path('contests');
            $file->move($path, $filename);
        }

        $contest->banner = $filename;
        $contest->title = $request->title;
        $contest->description = $request->desctiption;
        $contest->start = $request->start;
        $contest->end = $request->end;
        $contest->save();

        return redirect('admin/contest');
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
    public function edit(Contest $contest)
    {
        return view('admin/contest/edit')
            ->with('contest', $contest);
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
        dd($request);
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

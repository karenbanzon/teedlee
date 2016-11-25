<?php

namespace Teedlee\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Teedlee\Http\Controllers\Controller;
use Teedlee\Models\Contest;
use Teedlee\Http\Requests\SaveContest;
use Teedlee\Models\Order;
use Teedlee\User;
use Teedlee\Models\Judge;

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
            ->with('carbon', new Carbon())
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
            $filename = str_slug($request->title).'.'.$file->getClientOriginalExtension();
            $path = public_path('contests/'.$request->id);
            $file->move($path, $filename);
            $contest->banner = $filename;
        }

        $contest->title = $request->title;
        $contest->description = $request->description;
        $contest->start_at = $request->start_at;
        $contest->end_at = $request->end_at;
        $contest->close_at = $request->close_at;
        $contest->save();

        $contest->judges()->delete();

        if( isset($request->judge) && $request->judge ) {
            foreach ($request->judge as $judge) {
                $contest->judges()->create([
                    'contest_id' => $contest->id,
                    'user_id' => $judge,
                ]);
            }
        }

        $path = public_path('contests/'.$contest->id);
        if(!is_dir($path)) { mkdir($path, 0775); }

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
            ->with('contest', $contest)
            ->with('judges', User::where('user_group_id', 7)->get())
            ->with('carbon', new Carbon())
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

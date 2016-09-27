<?php

namespace Teedlee\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\Models\Vote;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($submission=null)
    {
        if( $submission )
        {
            $submissions = [$submission];
        } else {
            $submissions = \Auth::user()->votes_que()->toArray();
        }

        return view('voting.index')
            ->with('submissions', json_encode(array_reverse($submissions)))
        ;
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

        if( ($request->submission_id*1) > 0 && ($request->rating*1) > 0 ) {
            $model = (new \Teedlee\Models\Vote())
                        ->where('submission_id', $request->submission_id)
                        ->where('user_id', \Auth::user()->id)
            ;

            if( $model->count() )
            {
                return response('You already rated this submission.', 500);
            } else {
                $data = [
                    'user_id' => \Auth::user()->id,
                    'type' => $request->type ?: 'external',
                    'submission_id' => $request->submission_id*1,
                    'rating' => $request->rating*1,
                    'comment' => trim($request->comment),
                    'flags' => $request->flags ? json_encode($request->flags) : null,
                    'created_at' => Carbon::now()->toDateTimeString(),
                ];
                \Teedlee\Models\Vote::create($data);
            }
            return response('Rating successful.', 200);
        } else {
            return response('Rating is required', 500);
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

<?php

namespace Teedlee\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\Models\Vote;

class VoteController extends Controller
{
    /**
     * Display voting landing page.
     *
     * @return null
     */
    public function index()
    {
        return view('voting.index');
    }

    /**
     * Display when no submissions are qued for voting.
     *
     * @return null
     */
    public function done()
    {
        return view('voting.done');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($submission=null)
    {
        if( $submission )
        {
            $submissions = [$submission];
        } else {
            $submissions = \Auth::user()->votes_que()->toArray();
        }

        dd($submissions);

        return view('voting.create')
            ->with('submissions', json_encode(array_reverse($submissions)))
            ;
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
                    'flags' => $request->flags ? json_encode($request->flags, JSON_NUMERIC_CHECK) : null,
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

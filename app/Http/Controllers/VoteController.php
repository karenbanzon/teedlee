<?php

namespace Teedlee\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\Models\Vote;
use Teedlee\Models\Contest;

class VoteController extends Controller
{
    /**
     * Display voting landing page.
     *
     * @return null
     */
    public function index($contest=null)
    {
        return view('voting.index')
            ->with('contests', (new Contest())->active())
            ->with('carbon', new Carbon())
            ;
    }

    /**
     * Display when no submissions are qued for voting.
     *
     * @return null
     */
    public function done(Request $request)
    {
        $view = view('voting.done');

        if( $request->has('contest') )
        {
            $view->with('contest', Contest::find($request->contest)->first())
            ->with('contests', (new Contest())->active())
            ->with('carbon', new Carbon())
            ;
        }

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($submission=null, $referer=null, Contest $contest=null)
    {
        if( $submission !==null && $submission->toArray() )
        {
            $submissions = [$submission];
        } else {
            $submissions = \Auth::user()->votes_que($contest);
            $submission = $submissions->first();
            $submissions = $submissions->toArray();
        }

        return view('voting.create')
            ->with('submissions', json_encode(array_reverse($submissions)))
            ->with('submission', $submission)
            ->with('contest', $contest)
            ;
    }

    public function contest( Contest $contest, $referer=null )
    {
        return $this->create(null, null, $contest);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $is_contest = isset($request->entry_id);

        if( ( ($request->submission_id*1) > 0 || ($request->entry_id*1) > 0 ) && ($request->rating*1) > 0 )
        {
            if( !$is_contest ) {
                $model = (new \Teedlee\Models\Vote())
                    ->where('submission_id', $request->submission_id)
                    ->where('user_id', \Auth::user()->id);
            } else {
                $model = (new \Teedlee\Models\ContestVote())
                    ->where('entry_id', $request->entry_id)
                    ->where('user_id', \Auth::user()->id);
            }

            if( $model->count() )
            {
                return response('You already rated this submission.', 500);
            } else {
                $data = [
                    'user_id' => \Auth::user()->id,
                    'type' => $request->type ?: 'external',
                    'rating' => $request->rating*1,
                    'comment' => trim($request->comment),
                    'flags' => $request->flags ? json_encode($request->flags, JSON_NUMERIC_CHECK) : null,
                    'created_at' => Carbon::now()->toDateTimeString(),
                ];

                if( !$is_contest ) {
                    $data['submission_id'] = $request->submission_id*1;
                    \Teedlee\Models\Vote::create($data);
                } else {
                    $data['entry_id'] = $request->entry_id*1;
                    \Teedlee\Models\ContestVote::create($data);
                }

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

<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;
use \Teedlee\Models\Entry;
use Carbon\Carbon;

class Contest extends Model
{
    protected $fillable = [ 'user_id', 'title', 'start_at', 'end_at', 'close_at', 'banner', 'description', 'created_at' ];

    public function judges()
    {
        return $this->hasMany( '\Teedlee\Models\Judge' );
    }

    public function entries()
    {
        return $this->hasMany('\Teedlee\Models\Entry');
    }

    public function active()
    {
        $contests = $this
            ->whereIn('status', [
                'submission_closed',
                'submission_open',
                'submission_ended',
                'voting_open',
                'voting_ended',
                'awaiting_winners',
                'closed',
            ])->with('entries')->get();

//        dd($contests->toArray());

        return $contests;
    }

    public function open()
    {
        return $this
            ->whereColumn(\DB::raw('NOW()'), '<', 'close_at' )
            ->get()
            ;
    }

    public function submitting()
    {
        return $this
            ->whereColumn(\DB::raw('NOW()'), '>=', 'start_at' )
            ->whereColumn(\DB::raw('NOW()'), '<', 'end_at' )
            ->get()
            ;
    }

    public function voting()
    {
        return $this
            ->whereColumn(\DB::raw('NOW()'), '>=', 'start_at' )
            ->whereColumn(\DB::raw('NOW()'), '<', 'close_at' )
            ->get()
            ;
    }

    public function winners()
    {
        return $this->entries()
            ->where('is_winner', true )
            ;
    }

    public function status($status=null)
    {
        $status = $status ?: $this->status;

        switch ( $status )
        {
            case 'inactive':
                $response = 'Not yet started';
                break;

            case 'submission_closed':
                $response = 'Not yet started';
                break;

            case 'submission_open':
                $response = 'Submission open';
                break;

            case 'submission_ended':
                $response = 'Submission ended';
                break;

            case 'awaiting_winners':
                $response = 'Voting close';
                break;

            case 'closed':
                $response = 'Contest was closed';
                break;

            default:
                $response = $status;
                break;
        }

        return c($response);
    }

    /**
     * Updates contest entries status
     *
     * @return null
     */
    public function searchAndUpdate()
    {
        $carbon = Carbon::now();

//        Submission not yet started
        $this->whereDate('start_at', '>', $carbon->now())
            ->update([ 'status' => 'submission_closed'])
        ;

//        Submission open
        $this->whereDate('start_at', '<=', $carbon->now())
            ->whereDate('end_at', '>', $carbon->now())
            ->update([ 'status' => 'submission_open'])
        ;

//        Submission closed/Voting open
        $this->whereDate('end_at', '<=', $carbon->now())
            ->whereDate('close_at', '>', $carbon->now())
            ->update([ 'status' => 'voting_open'])
        ;

//        Voting ended
        $this->whereDate('close_at', '<=', $carbon->now())
            ->whereIn('status', ['submission_closed', 'submission_open', 'voting_open'])
            ->update([ 'status' => 'awaiting_winners'])
        ;
    }
}
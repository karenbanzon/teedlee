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
     * Check if entry is on submissions mode
     *
     * @return boolean
     */

    public function isSubmitting()
    {
        $now = Carbon::now();
        $end = Carbon::parse($this->end_at);
        $start = Carbon::parse($this->start_at);

        return ( $this->status == 'submission_open' ) ||
               ( $start->lt($now) && $end->gt($now) )
        ;
    }

    /**
     * Check if entry is on voting mode
     *
     * @return boolean
     */

    public function isVoting()
    {
        return $this->status == 'voting_open';
    }

    /**
     * Updates contest entries status
     *
     * @return null
     */
    public function searchAndUpdate()
    {
        $carbon = Carbon::now();
        $now = $carbon->toDateTimeString();
        \DB::enableQueryLog();

//        Submission not yet started
        Contest::where('start_at', '>', $now)
            ->update(['status' => 'submission_closed']);
//        dd(\DB::getQueryLog());

//        Voting open
        $contest = Contest::where('end_at', '<=', $now)
            ->where('start_at', '<=', $now)
            ->where('close_at', '>=', $carbon->now())
            ->update(['status' => 'voting_open'])
        ;

        $contest = Contest::where('start_at', '<=', $now)
            ->where('end_at', '>', $now)
            ->has('entries')
            ->update(['status' => 'voting_open'])
        ;

//        Submission open
        $contest = Contest::where('start_at', '<=', $now)
            ->where('end_at', '>', $now)
            ->has('entries', '<', 1)
            ->update(['status' => 'submission_open'])
        ;

//        Voting ended
        Contest::where('close_at', '<=', $now)
            ->whereIn('status', ['submission_closed', 'submission_open', 'voting_open'])
            ->update([ 'status' => 'awaiting_winners'])
        ;
    }
}
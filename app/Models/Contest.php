<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;
use \Teedlee\Models\Entry;

class Contest extends Model
{
    protected $fillable = [ 'user_id', 'title', 'start_at', 'end_at', 'close_at', 'banner', 'description', 'created_at' ];

    public function judges()
    {
        return $this->hasMany( '\Teedlee\Models\Judge' );
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
}
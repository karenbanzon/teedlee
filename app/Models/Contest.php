<?php namespace Teedlee\Models;

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
            ->with('user')
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
        $limit = set_time_limit(0);
        
        $before = Contest::pluck('status', 'id');
        
        $carbon = Carbon::now();
        $now = $carbon->toDateTimeString();
//        \DB::enableQueryLog();

//        Submission not yet started
        Contest::where('start_at', '>', $now)
            ->update(['status' => 'submission_closed']);
//        dd(\DB::getQueryLog());

//        Voting open
        Contest::where('end_at', '<=', $now)
            ->where('start_at', '<=', $now)
            ->where('close_at', '>=', $carbon->now())
            ->update(['status' => 'voting_open'])
        ;

        Contest::where('start_at', '<=', $now)
            ->where('end_at', '>', $now)
            ->has('entries')
            ->update(['status' => 'voting_open'])
        ;

//        Submission open
        Contest::where('start_at', '<=', $now)
            ->where('end_at', '>', $now)
            ->has('entries', '<', 1)
            ->update(['status' => 'submission_open'])
        ;

//        Voting ended
        Contest::where('close_at', '<=', $now)
            ->whereIn('status', ['submission_closed', 'submission_open', 'voting_open'])
            ->update([ 'status' => 'awaiting_winners'])
        ;
        
        $after = Contest::pluck('status', 'id');
        
//        pre_r($before);
//        pre_r($after);
//        dd('');
        
        $to = [];
        
        foreach( $before as $id => $status )
        {
            if( $before[$id] != $after[$id] )
            {
                $status = $after[$id];
                
//              Switch contest status
                if( $status == 'submission_closed' )
                {
                    $subject = 'Submission Closed';
                    
                } elseif( $status == 'awaiting_winners' ) {
                    $subject = 'Voting Closed';
                    
                } elseif( $status == 'closed' ) {
                    $subject = 'Winners';
                }
                
                if( !empty($subject) )
                {
                    $contest = Contest::find($id);
                    $to[$id] = [];
                    $subject = $contest->title.': ' . $subject;
                    $template = 'contest.email.'.$status;
                    $entries = $contest->entries()->where('status','<>','draft')->with('user')->get();
                    
//                    dd($entries->toArray());
//                    $users = json_decode(json_encode([ 
//                        ['id' => 3, 'email'=> 'jhourlad01@gmail.com', 'username' => 'jhourlad'], 
//                        ['id' => 16, 'email'=> 'jhourest@gmail.com', 'username' => 'user1476288505'], 
//                    ]));
                    
                    
                    foreach( $entries as $entry )
                    {
                        $user = $entry->user;
                        
                        if( !isset($to[$id][$user->email]) )
                        {
                            $to[$id][$user->email] = 1;
//                            print "Sending to {$user->email}<br>";
                            \Mail::send($template, ['contest' => $contest, 'user' => $user, 'subject' => $subject], function ($m) use ($user, $subject) {
                                $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                                $m->to($user->email, $user->username)->subject($subject);
                            });
                        }
                    }
                }
            }
        } 
//        dd($to);
    }
}
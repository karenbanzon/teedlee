<?php

namespace Teedlee;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Teedlee\Models\Contest;

class User extends Authenticatable
{
//    protected $appends = ['rating'];
    protected $with = ['user_group'];
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_group_id',
        'email',
        'username',
        'password',
        'firstname',
        'lastname',
        'phone',
        'mobile',
        'gender',
        'address',
        'address2',
        'province_id',
        'city_id',
        'about_me',
        'avatar',
        'website',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function user_group()
    {
        return $this->belongsTo('\Teedlee\Models\UserGroup');
    }

    public function rating()
    {
        $submissions = $this->submissions->where('status', 'publication');
        $rating = $submissions->avg('votes.internal.average');
        $count = 1;

        if( $public = $submissions->avg('votes.public.average') )
        {
            $rating = ($rating*2) + $public;
            $count = 3;
        }

        return round($rating / $count, 0);
    }

    public function submissions()
    {
        return $this->hasMany('\Teedlee\Models\Submission');
    }

    public function entries()
    {
        return $this->hasMany('\Teedlee\Models\Entry');
    }

    public function submissions_grouped()
    {
        return \Teedlee\Models\Submission::group($this->submissions()
            ->where('status', '!=', 'draft')
            ->get())
            ;
    }

    /**
     * @param null
     */
    public function votes ()
    {
        return $this->hasMany('Teedlee\Models\Vote');
    }

    /**
     * @param null
     */
    public function votes_que ($contest=null)
    {
        \DB::enableQueryLog();

        $voted = \Auth::user()->votes()->pluck('submission_id');

        if( \Auth::user()->user_group_id == 5 )
        {
            $submissions = (new \Teedlee\Models\Submission())
                ->whereNotIn('id', $voted)
                ->where('status', 'public_voting')
                ->orderBy('id');
        } else {
            $submissions = (new \Teedlee\Models\Submission())
                ->whereNotIn('id', $voted)
                ->where('status', 'internal_voting')
                ->where('internal_voting_start', '<>', null)
                ->where(\DB::raw('DATE_ADD(internal_voting_start, INTERVAL 7 day)'),  '>=', \DB::raw('NOW()') )
                ->orderBy('id');

            if( \Auth::user()->user_group_id == 7 )
            {
                $submissions->where(function( $sub ) use ($contest) {
                    $sub->where('contest_id', null);
                    if( $contest ) {
                        if( $contest->judges()->where('user_id', \Auth::user()->id)->count() ) {
                            $sub->orWhere('contest_id', $contest->id);
                        }
                    }
                });
            }
        }

//        if( $contest ){
//            $submissions->get();
//            dd(\DB::getQueryLog());
//        }

        return $submissions->get();
    }
}
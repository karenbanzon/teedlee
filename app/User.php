<?php

namespace Teedlee;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

//        This simple query is too low
        $rating = $submissions->avg('votes.internal.average');
        $count = 1;

        if( $public = $submissions->avg('votes.public.average') )
        {
            $rating = ($rating*2) + $public;
            $count = 3;
        }

        return $rating / $count;

//        ...going manual instead
//        $rating = 0; $count = 0;
//        foreach ( $submissions as $submission )
//        {
//            $rating += $submission->votes->internal->average*1 + $submission->votes->public->average*1;
//            $count++;
//        }

//        return $count ? $rating / $count : 0;
    }

    public function submissions()
    {
        return $this->hasMany('\Teedlee\Models\Submission');
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
    public function votes_que ()
    {
        $voted = \Auth::user()->votes()->pluck('submission_id');
//        dd($voted);

        $submissions = (new \Teedlee\Models\Submission())
            ->whereNotIn('id', $voted)
            ->where('status', 'public_voting')
            ->get();

//        dd($submissions->toArray());

        return $submissions;
    }
}
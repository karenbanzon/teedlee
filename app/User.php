<?php

namespace Teedlee;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'firstname',
        'lastname',
        'gender',
        'user_group_id',
        'province_id',
        'city_id',
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
        $voted = \Auth::user()->votes()->pluck('id');
        $submissions = (new \Teedlee\Models\Submission())
            ->whereNotIn('id', $voted)
            ->where('status', 'public_voting')
            ->get();

        return $submissions;
    }
}
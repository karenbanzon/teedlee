<?php

namespace Teedlee\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['user_id', 'title', 'slug', 'description', 'tags', 'price', 'status', 'internal_voting_start', 'public_voting_start', 'shopify_link', 'created_at'];
    protected $with = ['user','images'];
    protected $appends= ['shop_status', 'status_style', 'votes', 'internal_voting_end', 'public_voting_end' ];

    public $flag_list = ['Copyright or trademark infringement', 'Extreme profanity', 'Pornography', 'Racism', 'Religious, political and gender affront'];

    public function rules($rule)
    {
        $rules = [
            'artwork' => [
                'id' => 'required|exists:submissions',
                'artwork' => 'required|mimes:psd,ai,eps',
                'status' => 'required',
            ],
        ];

        return $rules[$rule];
    }

    public function user()
    {
        return $this->belongsTo('\Teedlee\User');
    }

    public function contest()
    {
        return $this->belongsTo('\Teedlee\Models\Contest');
    }

    public function images()
    {
        return $this->hasMany('\Teedlee\Models\SubmissionImage');
    }

    public function orders()
    {
        return $this->hasMany('\Teedlee\Models\Order');
    }

    public function flags()
    {
        return \Teedlee\Models\Vote::where('submission_id', $this->id)
            ->where('flags', '<>', null)->get();
    }

    public function getShopStatusAttribute()
    {
        if( in_array($this->status, ['submitted', 'submitted_orig_artwork']) ) {
            return 'Under Review';

        } else if(strpos($this->status, 'voting_fail') !== false) {
            return 'Declined';

        } else if( strpos($this->status, 'orig_artwork') !== false || $this->status == 'public_voting_success') {
            return 'Pending Original Artwork';

        } else if( strpos($this->status, 'voting') !== false ) {
            return 'For Voting';

        } else if( in_array($this->status, ['publication', 'production']) ) {
            return 'Published';

        } else if( $this->status == 'draft' ) {
            return null;

        } else {
            abort(500, $this->status . ' status is invalid');
            return str_replace('_', ' ', title_case($this->status));
        }
    }

    public function getStatusStyleAttribute()
    {
        if($this->status=='awaiting_orig_design')
        {
            return 'warning';

        } else if( strpos($this->status, 'fail') !== false)
        {
            return 'error';

        } else if($this->status=='publication' || $this->status=='production')
        {
            return 'success';

        } else {
            return 'info';
        }
    }

    public static function group(Collection $submissions = null)
    {
        $response = [
            'Published' => [],
            'Pending Original Artwork' => [],
            'For Voting' => [],
            'Under Review' => [],
            'Declined' => [],
        ];

        $status = null;

        foreach( $submissions as $submission )
        {
            $response[$submission->shop_status][] = $submission;
        }

        return array_filter($response);
    }

    public function getVotesAttribute()
    {
        $votes = (object) [
            'internal' => $this->votesByType('internal'),
            'public' =>  $this->votesByType('external'),
        ];
        
        if( $votes->internal->average && $votes->public->average )
        {
            $total = $votes->internal->average + $votes->public->average;
            $count = 2;
            
        } else if( (!$votes->internal->average && $votes->public->average) || ($votes->internal->average && !$votes->public->average) ) {
            $total = $votes->internal->average + $votes->public->average;
            $count = 1;

        } else if( !$votes->internal->average && !$votes->public->average ) {
            $total = 0;
            $count = 1;
        }

        $votes->average = $total / $count;
        return $votes;
    }

    public function votesByType($type)
    {
        $votes = \Teedlee\Models\Vote::where('submission_id', $this->id)->where('type', $type)->get();

        return (object) [
            'items' => $votes,
            'average' => $votes->avg('rating')
        ];

    }

    public function getInternalVotingEndAttribute()
    {
        return $this->internal_voting_start ? (Carbon::parse($this->internal_voting_start))->addDays(7)->toDateTimeString() : null;
    }

    public function getPublicVotingEndAttribute()
    {
        return $this->public_voting_start ? (Carbon::parse($this->public_voting_start))->addDays(7)->toDateTimeString() : null;
    }

    public function searchAndExpire()
    {
        \DB::enableQueryLog();

//        Internal voting
        $submissions = $this
            ->where('status', 'internal_voting')
            ->where('internal_voting_start', '<>', null)
            ->where(\DB::raw('DATE_ADD(internal_voting_start, INTERVAL 7 day)'),  '<=', \DB::raw('NOW()') )
            ->get()
        ;

        foreach ( $submissions as $submission )
        {
            if($submission->flags()->count())
            {
                $status = 'internal_voting_fail';
                $title = 'Disqualification';

            } else if($submission->votes->internal->average < 1.9) {
                $status = 'internal_voting_fail';
                $title = 'Try again :(';

            } else if($submission->votes->internal->average < 3.5) {
                $submission->public_voting_start = Carbon::now();
                $status = 'public_voting';

            } else {
                $status = 'awaiting_orig_artwork';
            }

            $submission->status = $status;
            $submission->save();
            
            $user = $submission->user;
            \Mail::send("admin.submission.email.$status", ['submission' => $submission, 'user' => $user], function ($m) use ($submission, $title, $user) {
                $m->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
                $m->to($submission->user->email, $submission->user->username)->subject($title);
            });
        }

//        Public voting
        $submissions = $this
            ->where('status', 'public_voting')
            ->where('public_voting_start', '<>', null)
            ->where(\DB::raw('DATE_ADD(public_voting_start, INTERVAL 7 day)'),  '<=', \DB::raw('NOW()') )
            ->get();

        foreach ( $submissions as $submission )
        {
            $status = $submission->status;

            if($submission->votes->average*1 < 3.5)
            {
                $status = 'public_voting_fail';
                $title = 'Your Final Score';
                
            } else {
                $status = 'public_voting_success';
                $title = 'Congratulations! The community has selected your design for the online store!';
            }
            
            $submission->status = $status;
            $submission->save();
            
            $user = $submission->user;
            \Mail::send("admin.submission.email.$status", ['submission' => $submission, 'user' => $user], function ($m) use ($submission, $title, $user) {
                $m->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
                $m->to($submission->user->email, $submission->user->username)->subject($title);
            });            
        }

        \DB::disableQueryLog();
    }
}
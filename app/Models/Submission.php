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

    public function user()
    {
        return $this->belongsTo('\Teedlee\User');
    }

    public function images()
    {
        return $this->hasMany('\Teedlee\Models\SubmissionImage');
    }

    public function getShopStatusAttribute()
    {
        if( in_array($this->status, ['submitted', 'submitted_orig_artwork']) ) {
            return 'Under Review';

        } else if( in_array($this->status, ['public_voting', 'internal_voting']) )
        {
            return 'For Voting';

        } else if($this->status=='public_voting_fail')
        {
            return 'Declined';

        } else if($this->status=='awaiting_orig_artwork')
        {
            return 'Pending Original Artwork';

        } else if( in_array($this->status, ['public_voting_success', 'publication', 'production']) )
        {
            return 'Published';

        } else {
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
        $response = [];
        $status = null;

        foreach( $submissions as $submission )
        {
            $response[$submission->shop_status][] = $submission;
        }

        return $response;
    }

    public function getVotesAttribute()
    {
        return (object) [
            'internal' => $this->votesByType('internal'),
            'public' =>  $this->votesByType('external'),
        ];
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
//        Internal voting
        $submissions = $this
            ->where('status', 'internal_voting')
            ->where('internal_voting_start', '<>', null)
            ->where('internal_voting_start', '<=', Carbon::parse($this->internal_voting_start)->addDays(7))
            ->get()
        ;

        foreach ( $submissions as $submission )
        {
            if($submission->votes->internal->average < 3.5)
            {
                $status = 'public_voting';
            } else {
                $status = 'awaiting_orig_artwork';
            }

            $submission->status = $status;
            $submission->save();
        }

//        Public voting
        $submissions = $this
            ->where('status', 'public_voting')
            ->where('public_voting_start', '<>', null)
            ->where('public_voting_start', '<=', Carbon::parse($this->public_voting_start)->addDays(7))
            ->get();

        foreach ( $submissions as $submission )
        {
            if($submission->votes->public->average < 3.5)
            {
                $status = 'public_voting_fail';

            } else {
                $status = 'public_voting_success';

            }
            $submission->save();
        }
    }
}
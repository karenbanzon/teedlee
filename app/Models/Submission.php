<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'tags', 'price', 'status', 'created_at'];
    protected $with = ['user','images'];
    protected $appends= ['shop_status', 'status_style'];

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

        } else if($this->status=='public_voting_fail')
        {
            return 'error';

        } else if($this->status=='publication' || $this->status=='production')
        {
            return 'success';

        } else {
            return 'default';
        }
    }

    public static function group(Collection $submissions = null)
    {
        $response = [];
        $status = null;

        foreach( $submissions as $submission )
        {
//            if(  )
//            {
//
//            }
            $response[$submission->shop_status][] = $submission;
        }

        return $response;
    }
}
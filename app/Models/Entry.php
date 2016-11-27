<?php

namespace Teedlee\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public $appends = ['rating'];
    public $flag_list = ['Copyright or trademark infringement', 'Extreme profanity', 'Pornography', 'Racism', 'Religious, political and gender affront'];
    protected $fillable =[ 'contest_id', 'user_id', 'title', 'description', 'tags', 'status', 'declined_reason', 'shopify_link', 'updated_at' ];

    public function images()
    {
        return $this->hasMany('\Teedlee\Models\EntryImage');
    }

    public function votes()
    {
        return $this->hasMany('\Teedlee\Models\ContestVote');
    }

    public function getRatingAttribute()
    {
        return $this->votes->avg('rating');
    }

    public function contest()
    {
        return $this->belongsTo('\Teedlee\Models\Contest');
    }


    public function user()
    {
        return $this->belongsTo('\Teedlee\User');
    }

    public function getShopStatusAttribute()
    {
        if( in_array($this->status, ['submitted', 'submitted_orig_artwork']) ) {
            return 'Under Review';

        } else if(strpos($this->status, 'voting_fail') !== false)
        {
            return 'Declined';

        } else if( strpos($this->status, 'voting') !== false )
        {
            return 'For Voting';

        } else if( strpos($this->status, 'orig_artwork') !== false )
        {
            return 'Pending Original Artwork';

        } else if( in_array($this->status, ['public_voting_success', 'publication', 'production']) )
        {
            return 'Published';

        } else if( $this->status == 'draft' ) {
            return null;

        } else {
            abort(500, $this->status . ' status is invalid');
            return str_replace('_', ' ', title_case($this->status));
        }
    }

    /**
     * Updates contest entries status
     *
     * @return null
     */
    public function searchAndUpdate()
    {
        $carbon = Carbon::now();

//        Internal voting within 24 hrs
        $this->where(\DB::raw('DATE_ADD(created_at, INTERVAL 1 day)'), '>', $carbon->now())
            ->whereNull('declined_reason')
            ->where('status', '<>', 'draft')
            ->update([ 'status' => 'internal_voting'])
        ;

//        Public voting after 24 hrs
        $this->where(\DB::raw('DATE_ADD(created_at, INTERVAL 1 day)'), '<=', $carbon->now())
            ->whereNull('declined_reason')
            ->where('status', '<>', 'draft')
            ->update([ 'status' => 'public_voting'])
        ;
    }
}
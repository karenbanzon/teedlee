<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable =[ 'contest_id', 'user_id', 'title', 'description', 'tags', 'status', 'declined_reason', 'shopify_link', 'updated_at' ];

    public function images()
    {
        return $this->hasMany('\Teedlee\Models\EntryImage');
    }

    public function contest()
    {
        return $this->belongsTo('\Teedlee\Models\Contest');
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

}

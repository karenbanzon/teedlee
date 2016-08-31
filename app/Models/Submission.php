<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'status', 'created_at'];
    protected $with = ['images'];
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
        if($this->status=='submitted')
        {
            return 'Under Review';

        } else if($this->status=='public_voting_fail')
        {
            return 'Declined';

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
            return '';
        }
    }
}
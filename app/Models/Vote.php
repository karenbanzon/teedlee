<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public $with = ['user'];

    protected $fillable = ['user_id', 'submission_id', 'rating', 'type', 'comment', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('\Teedlee\User');
    }

    public function submission()
    {
        return $this->belongsTo('\Teedlee\Models\Submission');
    }
}
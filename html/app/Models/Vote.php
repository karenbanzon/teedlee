<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['user_id', 'submission_id', 'rating', 'comment', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(\Teedlee\User());
    }

    public function submission()
    {
        return $this->belongsTo(\Teedlee\Models\Submission());
    }
}
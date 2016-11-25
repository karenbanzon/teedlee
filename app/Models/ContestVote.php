<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class ContestVote extends Model
{
    protected $fillable = ['user_id', 'contest_id', 'rating', 'type', 'comment', 'flags', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('\Teedlee\User');
    }

    public function entry()
    {
        return $this->belongsTo('\Teedlee\Models\Entry');
    }
}

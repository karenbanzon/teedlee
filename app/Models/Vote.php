<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function user()
    {
        return $this->belongsTo(\Teedlee\User());
    }

    public function submission()
    {
        return $this->belongsTo(\Teedlee\Models\Submission());
    }
}
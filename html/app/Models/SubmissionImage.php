<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionImage extends Model
{
    public $timestamps = false;

    function submission()
    {
        return $this->belongsTo('\Teedlee\Models\Submission');
    }
}

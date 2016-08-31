<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionImage extends Model
{
    function submission()
    {
        return $this->belongsTo('\Teedlee\Models\Submission');
    }
}

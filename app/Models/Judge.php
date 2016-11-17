<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    protected $fillable = [ 'user_id', 'email', 'contest_id' ];

    public function contest()
    {
        return $this->belongsToMany('\Tedlee\Models\Contest');
    }
}

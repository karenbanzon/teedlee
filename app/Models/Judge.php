<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    protected $fillable = [ 'user_id', 'email', 'contest_id' ];
    protected $with = ['user'];

    public function contest()
    {
        return $this->belongsToMany('\Teedlee\Models\Contest');
    }

    public function user()
    {
        return $this->belongsTo('\Teedlee\User');
    }
}

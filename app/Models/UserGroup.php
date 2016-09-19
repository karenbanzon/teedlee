<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    public function user()
    {
        return $this->hasMany('\Teedlee\User');
    }
}

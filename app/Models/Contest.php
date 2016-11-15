<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = [ 'user_id', 'title', 'start', 'end', 'banner', 'description', 'created_at' ];
}

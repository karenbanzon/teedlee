<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable =[ 'contest_id', 'title', 'description', 'tags', 'status', 'declined_reason', 'shopify_link', 'updated_at' ];

    public function images()
    {
    }
}

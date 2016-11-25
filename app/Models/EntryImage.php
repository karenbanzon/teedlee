<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class EntryImage extends Model
{
    protected $fillable = ['entry_id', 'path'];
    public $timestamps = false;
}

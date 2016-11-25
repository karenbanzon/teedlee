<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;
use \Teedlee\Models\Entry;

class Contest extends Model
{
    protected $fillable = [ 'user_id', 'title', 'start_at', 'end_at', 'close_at', 'banner', 'description', 'created_at' ];

    public function judges()
    {
        return $this->hasMany( '\Teedlee\Models\Judge' );
    }

    public function open()
    {
        return $this
            ->whereColumn(\DB::raw('NOW()'), '<', 'close_at' )
            ->get()
            ;
    }

    public function submitting()
    {
        return $this
            ->whereColumn(\DB::raw('NOW()'), '>=', 'start_at' )
            ->whereColumn(\DB::raw('NOW()'), '<', 'end_at' )
            ->get()
            ;
    }

    public function voting()
    {
        return $this
            ->whereColumn(\DB::raw('NOW()'), '>=', 'start_at' )
            ->whereColumn(\DB::raw('NOW()'), '<', 'close_at' )
            ->get()
            ;
    }
}
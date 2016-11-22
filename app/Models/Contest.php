<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = [ 'user_id', 'title', 'start_at', 'end_at', 'close_at', 'banner', 'description', 'created_at' ];

    public function judges()
    {
        return $this->hasMany( '\Teedlee\Models\Judge' );
    }

    public function active()
    {
        return $this
            ->whereColumn(\DB::raw('NOW()'), '>=', 'start' )
            ->whereColumn(\DB::raw('NOW()'), '<=', 'end' )
            ->get()
        ;
    }
}

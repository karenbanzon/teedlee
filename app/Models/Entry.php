<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable =[ 'contest_id', 'user_id', 'title', 'description', 'tags', 'status', 'declined_reason', 'shopify_link', 'updated_at' ];

    public function images()
    {
        return $this->hasMany('\Teedlee\Models\EntryImage');
    }

    public static function group($entries = null)
    {
        $response = [
            'Published' => [],
            'Pending Original Artwork' => [],
            'For Voting' => [],
            'Under Review' => [],
            'Declined' => [],
        ];

        $status = null;

        foreach( $entries as $entry )
        {
            $response[$entry->shop_status][] = $entry;
        }

        return array_filter($response);
    }
}

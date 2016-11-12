<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'submission_id',
        'order_id',
        'store',
        'price',
        'quantity',
        'discount',
        'fee',
        'commission',
        'status',
        'remarks',
        'created_at',
        'updated_at',
    ];
}
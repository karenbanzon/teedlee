<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = \App::make('ShopifyAPI');
        $this->api->setup([
            'API_KEY' => config('services.shopify.api_key'),
            'API_SECRET' => config('services.shopify.api_secret'),
            'SHOP_DOMAIN' => config('services.shopify.domain'),
            'ACCESS_TOKEN' => config('services.shopify.password')
        ]);
    }

    public function all()
    {
        $result = $this->api->call([
            'METHOD' => 'GET',
            'URL' => '/admin/orders.json'
        ]);

        dd($result);
    }
}

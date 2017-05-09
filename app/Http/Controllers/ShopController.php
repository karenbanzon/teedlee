<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\Providers\AuthWrapperProvider as Auth;
use Teedlee\Models\SocialAccount;
use Socialite;

class ShopController extends BaseController
{
    public $api;

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

    public function getVendor(Request $request)
    {
        dd($request->all());
    }

    public function callback()
    {
        $sh->installURL(['permissions' => array('read_orders'), 'redirect' => config('services.shopify.redirect')]);
        dd();
    }
}
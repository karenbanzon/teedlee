<?php

namespace Teedlee\Providers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ShopifyWrapperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(ResponseFactory $response)
    {
        $this->mapConfig();
    }

    protected function mapConfig()
    {
        $this->api = \App::make('ShopifyAPI', [
            'API_KEY' => config('services.shopify.api_key'),
            'API_SECRET' => config('services.shopify.api_secret'),
            'SHOP_DOMAIN' => config('services.shopify.domain'),
            'ACCESS_TOKEN' => config('services.shopify.api_password')
        ]);
    }

    public function all()
    {
        $result = $this->api->call([
            'METHOD' => 'GET',
            'URL' => '/admin/orders.json?status=any'
        ]);
    }

    public function vendor($vendor)
    {
        $orders = [];

        foreach($this->all() as $order)
        {
            if( $order->line_items->vendor == $vendor )
            {
                $orders[] = $order;
            }
        }

        return $orders;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

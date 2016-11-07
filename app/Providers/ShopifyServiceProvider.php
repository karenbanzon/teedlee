<?php

namespace Teedlee\Providers;

use Illuminate\Support\ServiceProvider;
use Oseintow\Shopify\Facades\Shopify;

class ShopifyServiceProvider extends ServiceProvider
{
    protected $shop;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->shop = Shopify::setShopUrl(config('shopify.domain'))
            ->setAccessToken(config('shopify.token'));
    }
//
//    /**
//     * Register the application services.
//     *
//     * @return void
//     */
//    public function register()
//    {
//        //
//    }

    public function products($vendor=null)
    {
        $this->boot();
        return $this->shop->get("admin/products.json", ['vendor' => $vendor]);
    }

    public function product($product_id)
    {
        $this->boot();
        return $this->shop->get("admin/products/{$product_id}.json");
    }

    public function sales($vendor=null)
    {
        $this->boot();
        $products = [];
        $orders = $this->shop->get("admin/orders.json", ['vendor' => $vendor, 'status' => 'any']);
//        print_r($orders);
        foreach( $orders as $order )
        {
            foreach( $order->line_items as $item )
            {

                if( !isset($products[$item->product_id]) )
                {
                    $products[$item->product_id] = [
                        'id' => $item->id,
                        'product_id' => $item->product_id,
                        'variant_id' => $item->id,
                        'title' => $item->title,
                        'name' => $item->name,
                        'quantity' => 0,
                        'price' => $item->price,
                    ];

                    $images = $this->shop->get("admin/products/{$item->product_id}/images.json");
                    foreach ( $images as $image )
                    {
                        $products[$item->product_id]['images'][] = $image->src;
                    }
                }

                $products[$item->product_id]['quantity'] += $item->quantity;
            }
        }

        return $products;
    }


    public function sales_by_product($product_id)
    {
        $this->boot();
        $products = [];
        $orders = $this->shop->get("admin/orders.json", ['status' => 'any']);
//        print_r($orders);
        foreach( $orders as $order )
        {
            dd($order);
            foreach( $order->line_items as $item )
            {
                if( $item->product_id == $product_id )
                {
                    $products[$item->id] = [
                        'id' => $item->id,
                        'date' => $order->closed_at,
                        'order_number' => $order->order_number,
                        'product_id' => $item->product_id,
                        'variant_id' => $item->id,
                        'sku' => $item->id,
                        'title' => $item->title,
                        'name' => $item->name,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
    //                        'discount' => $order->discount,
                        'total' => $order->total_line_items_price,
                        'status' => $order->financial_status,
                        'customer' => (array) $order->customer,
                    ];
                }
            }
        }

//        dd($products);
        return $products;
    }
}

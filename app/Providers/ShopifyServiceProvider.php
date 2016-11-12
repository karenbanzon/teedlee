<?php

namespace Teedlee\Providers;

use Illuminate\Support\ServiceProvider;
use Oseintow\Shopify\Facades\Shopify;
use Teedlee\Models\Order;
use Teedlee\Models\Submission;
use Teedlee\User;

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

    public function submission_sales($vendor=null)
    {
        $vendor = $vendor ? User::where('username', $vendor)->first() : \Auth::user();
        \Log::info("'Sales summary for '{$vendor->username}'");
        $submissions = $vendor->submissions()->pluck('id');
        $orders = Order::select([
                'orders.submission_id',
                \DB::raw('AVG(orders.price) price'),
                \DB::raw('SUM(orders.quantity) quantity'),
                \DB::raw('SUM(orders.commission) commission'),
                'submissions.title',
                \DB::raw('img.thumbnail'),
            ])
            ->where('orders.fulfillment', 'fulfilled')
            ->whereIn('orders.submission_id', $submissions)
            ->groupBy(['orders.submission_id', 'img.submission_id', 'img.thumbnail'])
            ->join('submissions', 'orders.submission_id', '=', 'submissions.id' )
            ->leftJoin(\DB::raw('(SELECT submission_id, MIN(path) thumbnail FROM submission_images GROUP BY submission_id) img'), 'img.submission_id', '=', 'submissions.id')
            ->get();
        return $orders;
    }

    public function submission_sales_items(Submission $submission)
    {

    }


    public function addMetafields(&$products)
    {
        $this->boot();
        foreach ($products as $key => $value)
        {
            \Log::info("get: admin/products/{$products[$key]['product_id']}/metafields.json");
            $metafields = $this->shop->get("admin/products/{$products[$key]['product_id']}/metafields.json");
            foreach ($metafields as $meta)
            {
                $value[$meta->key] = $meta->value;
            }
            $products[$key] = $value;
        }
    }
}

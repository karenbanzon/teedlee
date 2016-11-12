<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\Models\Order;
use Teedlee\Models\Submission;
use Teedlee\User;
use Teedlee\Providers\ShopifyServiceProvider;

class OrderController extends Controller
{
    protected $shopify;

//    public function __construct(Shopify $shopify)
//    {
//        $this->shopify = Shopify::setShopUrl(config('shopify.domain'))
//            ->setAccessToken(config('shopify.token'));
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = (new ShopifyServiceProvider(new \Oseintow\Shopify\Facades\Shopify()))->sales();
        dd($orders);
    }

    public function all()
    {
        $orders = $this->_all();
        dd($orders);
    }

    protected function _all()
    {
        return $this->shopify->get("admin/orders.json", ['status' => 'any']);
    }


    public function vendor(User $user)
    {
        dd('vendor!');
        $orders = [];

        foreach($this->_all() as $order)
        {
            dd($order);
            if( strtolower($order->line_items->vendor) == strtolower($user->username) )
            {
                $orders[] = $order;
            }
        }

        dd($orders);
    }


    public function product(Submission $submission)
    {
        dd('product!');
        $orders = [];

        foreach($this->_all() as $order)
        {
            if( strtolower($order->line_items->url) == strtolower($submission->shopify_link) )
            {
                $orders[] = $order;
            }
        }

        return $orders;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->json()->all();
        \Log::info("Order::store\r\n".json_encode($request));
        $order = (new Order())->findOrCreate('order_id', $request->order_id);
//        'user_id' => \Auth::
//        'submission_id',
//        'order_id',
//        'store',
//        'price',
//        'quantity',
//        'discount',
//        'fee',
//        'commission',
//        'status',
//        'remarks',
//        'created_at',
//        'updated_at',
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=null)
    {
        \Log::info("Order::update\r\n".json_encode($request->json()->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sales_items($product_id)
    {
        dd('sales_items');
        $product = (new ShopifyServiceProvider(new \Oseintow\Shopify\Facades\Shopify()))->product($product_id);
//        dd($product);
        $orders = (new ShopifyServiceProvider(new \Oseintow\Shopify\Facades\Shopify()))->sales_by_product($product_id);
//        dd($orders);
        return view('user/sales-items')
            ->with('orders', $orders)
            ->with('product', $product)
            ->with('total_quantity', 0)
            ->with('total_sales', 0)
            ;
    }
}
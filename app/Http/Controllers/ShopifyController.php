<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\User;
use Teedlee\Models\Submission;
use Teedlee\Models\Order;
use Teedlee\Providers\ShopifyServiceProvider;

class ShopifyController extends Controller
{
    protected $service;

    function __construct()
    {
        $this->service = new ShopifyServiceProvider(new \Oseintow\Shopify\Facades\Shopify());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $response)
    {
        $request = $response->json()->all();
        \Log::info("Order::store\r\n".json_encode($request));

        foreach ( $request['line_items'] as $item )
        {
            $meta = [['product_id' => $item['product_id']]];
            $meta = $this->service->addMetafields($meta);

            $order = new Order();
            $order->user_id = 0;
            $order->email = $request['email'];
            $order->submission_id = 0; //$meta[0]['submission_id'];
            $order->order_id = $request['order_number'];
            $order->store = 'shopify';
            $order->sku = $item['sku'];
            $order->price = $item['price'];
            $order->quantity = $item['quantity'];
            $order->fee = 0;
            $order->discount = $item['total_discount'];
            $order->commission = $this->getCommission($order);
            $order->status = $request['financial_status'];
            $order->remarks = $item['note'];
            $order->save();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $request = $request->json()->all();
        \Log::info("Order::store\r\n".json_encode($request));
//        $order = (new Order())->findOrCreate('order_id', $request->order_id);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getCommission(Order $order)
    {
        $type = substr($order->sku,0,2);

        if( $order->price*$order->quantity < 750 )
        {
            return $type == 'BT' ? 200 : 100;
        } else {
            return $type == 'BT' ? 250 : 150;
        }
    }
}
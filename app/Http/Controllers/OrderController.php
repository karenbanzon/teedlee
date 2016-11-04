<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\User;

class OrderController extends Controller
{
    protected $api;

    function __construct()
    {
        $this->api = \App::make('ShopifyAPI', [
            'API_KEY' => config('services.shopify.api_key'),
            'API_SECRET' => config('services.shopify.api_secret'),
            'SHOP_DOMAIN' => config('services.shopify.domain'),
            'ACCESS_TOKEN' => config('services.shopify.token')
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    protected function all()
    {
        $orders = $this->_all();
        dd($orders);
    }

    protected function _all()
    {
        $orders = $this->api->call([
            'METHOD' => 'GET',
            'URL' => '/admin/orders.json?status=any'
        ]);

        return $orders;
    }


    public function vendor(User $user)
    {
        $orders = [];

        foreach($this->_all() as $order)
        {
            dd($order);
            if( strtolower($order->line_items->vendor) == strtolower($user->username) )
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
    public function create()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
}

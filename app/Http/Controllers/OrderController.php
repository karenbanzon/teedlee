<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use Teedlee\Models\Submission;
use Teedlee\User;
use Oseintow\Shopify\Facades\Shopify;

class OrderController extends Controller
{
    protected $shopify;

    public function __construct(Shopify $shopify)
    {
        $this->shopify = Shopify::setShopUrl(config('shopify.domain'))
            ->setAccessToken(config('shopify.token'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $orders = [];

        foreach($this->_all() as $order)
        {
            if( strtolower($order->line_items->vendor) == strtolower($user->username) )
            {
                $orders[] = $order;
            }
        }

        return $orders;
    }


    public function product(Submission $submission)
    {
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

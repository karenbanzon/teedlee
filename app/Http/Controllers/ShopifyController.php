<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\User;
use Teedlee\Models\Submission;
use Teedlee\Models\Order;
use Teedlee\Providers\ShopifyServiceProvider;

class ShopifyController extends Controller
{
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
    public function create(Request $request)
    {
        $request = $request->json()->all();
        \Log::info("Order::store\r\n".json_encode($request));
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
}

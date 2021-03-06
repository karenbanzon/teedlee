@extends('master')
@section('content')
    <div class="small-12">
        @include('user/sidebar')
        <div class="card small-12 large-10 padding-20">
            <div class="card small-12">
                <a href="{!! url('user/sales') !!}" class="display-inline-block margin-top-10"><span class="icon icon-left"></span> Back to overview</a>
                <h6>Sales for {!! $submission['title'] !!}</h6>
                <table style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice No.</th>
                        <th>SKU</th>
                        <th>Qty</th>
                        <th>Sold to</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{!! $order->created_at !!}</td>
                        <td>{!! $order->order_id !!}</td>
                        <td>{!! $order->sku !!}</td>
                        <td>{!! $order->quantity !!}</td>
                        <td>{!! $order->email !!}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
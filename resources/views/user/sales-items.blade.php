@extends('master')
@section('content')
    <div class="small-12">
        <div class="card small-2 show-for-large">
            <nav class="account-nav">
                <a href="">Profile</a>
                <a href="" class="active">Submissions</a>
                <a href="">Sales</a>
            </nav>
        </div>
        <div class="card small-12 hide-for-large">
            <nav class="account-nav-small">
                <a href="">Profile</a>
                <a href="">Submissions</a>
                <a href="" class="active">Sales</a>
            </nav>
        </div>
        <div class="card small-12 large-10 padding-20">
            <div class="card small-12">
                <a href="{!! user/sales !!}" class="display-inline-block margin-top-10"><span class="icon icon-left"></span> Back to overview</a>
                <h6>Sales for {!! $product['title'] !!}</h6>
                <table style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice No.</th>
                        <th>Qty</th>
                        <th>Sold to</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{!! $order['date'] !!}</td>
                        <td>{!! $order['order_number'] !!}</td>
                        <td>{!! $order['quantity'] !!}</td>
                        <td>{!! $order['customer']['first_name'] . ' ' . $order['customer']['last_name']!!}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
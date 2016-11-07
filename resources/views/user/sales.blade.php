@extends('master')
@section('content')
        <div class="small-12">
            <section class="row">
                <div class="small-12 large-8 large-offset-2">
                    <hr>
                    <h4 class="text-center">My Account</h4>
                    <hr>
                </div>
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
                            <h6>Designs in store</h6>
                            <table style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Design</th>
                                    <th>Title</th>
                                    <th>SRP</th>
                                    <th>Sold</th>
                                    <th>Earnings</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $products as $product )
                                <tr>
                                    <td>
                                        <img src="{!! $product['images'][0] !!}">
                                    </td>
                                    <td>{!! $product['name'] !!}</td>
                                    <td>PHP {!! $product['price'] !!}</td>
                                    <td>{!! $product['quantity'] !!}</td>
                                    <td>PHP {!! number_format($product['price'] * $product['quantity'], 2) !!}</td>
                                    <td>
                                        <a href="{!! url("sales/product/{$product['product_id']}") !!}" class="button tiny white">View</a>
                                    </td>
                                </tr>
                                <?php $total_quantity += $product['quantity']; $total_sales += $product['price'] * $product['quantity']; ?>
                                @endforeach
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><h6>Total</h6></td>
                                    <td>{!! $total_quantity !!}</td>
                                    <td>PHP {!! number_format($total_sales, 2) !!}</td>
                                    <td>
                                        <a href="{!! url('user/remit') !!}" class="button tiny">Remit</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection
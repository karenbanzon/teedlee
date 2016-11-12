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
                                    <th class="text-left">Title</th>
                                    <th class="text-right">SRP</th>
                                    <th class="text-right">Sold</th>
                                    <th class="text-right">Earnings</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $submissions as $submission )
                                <tr>
                                    <td width="10%">
                                        <img src="{!! $submission->thumbnail !!}">
                                    </td>
                                    <td class="text-left">{!! $submission->title !!}</td>
                                    <td class="text-right">PHP {!! number_format($submission->price, 2) !!}</td>
                                    <td class="text-right">{!! $submission->quantity !!}</td>
                                    <td class="text-right">PHP {!! number_format($submission->commission, 2) !!}</td>
                                    <td>
                                        <a href="{!! url("orders/product/{$submission->submission_id}") !!}" class="button tiny white">View</a>
                                    </td>
                                </tr>
                                <?php $total_quantity += $submission->quantity; $total_sales += $submission->commission; ?>
                                @endforeach
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><h6>Total</h6></td>
                                    <td class="text-right">{!! $total_quantity !!}</td>
                                    <td class="text-right">PHP {!! number_format($total_sales, 2) !!}</td>
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
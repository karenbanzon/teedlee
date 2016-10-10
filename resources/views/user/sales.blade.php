@extends('master')
@section('content')
    <section class="row">
        <div class="small-12 medium-8 medium-offset-2">
            <hr>
            <h4 class="text-center">My Account</h4>
            <hr>
        </div>
        <div class="small-12">
            @include('user/sidebar')
            <div class="card small-12 medium-10 padding-20">
                <div class="card small-12 text-center">
                    <h4>Coming soon.</h4>
                    <p>This feature will let you track the sales of your designs.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <section class="row">
        <div class="small-12 large-8 large-offset-2">
            <hr>
            <h4 class="text-center">My Account</h4>
            <hr>
        </div>
        <div class="small-12">
            @include('user/sidebar')

            <div class="card small-12 large-10 padding-20">
                @if( $entries->count() )
                    @include('user.partials.entries-list')
                @else
                    @include('user.partials.submission-empty')
                @endif
            </div>
        </div>
    </section>
@endsection
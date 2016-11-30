@extends('master')

@section('title')
    Vote for T-Shirt
@endsection

@section('content')
    <section class="row">
        <div class="small-12 large-8 large-offset-2 text-center">
            @include('voting.open-submissions')
            @include('voting.contest-list')
        </div>
    </section>
@endsection
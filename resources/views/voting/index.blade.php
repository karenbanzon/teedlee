@extends('master')

@section('title')
    Vote for T-Shirt
@endsection

@section('content')
    <section class="row">
        <div class="small-12 large-8 large-offset-2 text-center">
            <h4>Entries from Open Submission</h4>
            <p><a href="{!! url('vote/create') !!}"><img src="images/about-teedlee.png"></a></p>
            <a href="{!! url('vote/create') !!}" class="button white small">Vote</a>
            @foreach( $contests as $contest )
            <hr>
            <h4>Entries for {!! $contest->title !!}</h4>
            <p>Ends in <strong>{!! $carbon->diffForHumans($carbon->parse($contest->end), $carbon->now()) !!}</strong>.</p>
            <p><a href=""><img src="{!! url('contests/'.$contest->banner) !!}"></a></p>
            <a href="{!! url('vote/contest/'.$contest->id) !!}" class="button white small">Vote</a>
            @endforeach
        </div>
    </section>

@endsection
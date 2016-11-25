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
                <h4>{!! $contest->title !!}</h4>

                @if( $carbon->now() < $carbon->parse($contest->start_at) )
                    <p>Voting opens in <strong>{!! $carbon->now()->diffForHumans($carbon->parse($contest->start_at), true) !!}</strong>.</p>
                @else
                    <p>Ends in <strong>{!! $carbon->diffForHumans($carbon->parse($contest->end_at), $carbon->now()) !!}</strong> days.</p>
                @endif
                <p>
                    @if( $carbon->now() < $carbon->parse($contest->start_at) )
                        {!! Html::image('contests/'.$contest->banner) !!}
                    @else
                        <a href="{!! url('vote/contest/'.$contest->id) !!}">
                            {!! Html::image('contests/'.$contest->banner) !!}
                        </a>
                    @endif
                </p>
                @if( $carbon->now() >= $carbon->parse($contest->start_at) )
                    <a href="{!! url('vote/contest/'.$contest->id) !!}" class="button white small">Vote</a>
                @endif
                <hr>
            @endforeach
        </div>
    </section>
@endsection
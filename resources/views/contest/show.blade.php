@extends('master')

@section('title')
    {!! $contest->title !!}
@endsection

@section('head')
@endsection

@section('content')
    <section class="row">
        <div class="small-12 large-8 large-offset-2">
            <hr>
            <h4 class="text-center">{!! $contest->title !!}</h4>
            <hr>
        </div>
        <div class="small-12 large-8 large-offset-2">
            <div class="text-center">
                {!! Html::image('contests/'.$contest->id.'/'.$contest->banner) !!}
                <p class="text-bold">
                @if( $carbon->now() < $start )
                    Voting opens in {!! $carbon->now()->diffForHumans($start, true) !!}.
                @elseif($carbon->now() >= $close)
                    Winners will be announced on <strong>29 December, 2016</strong>.
                @else
                    Submissions open.
                @endif
                </p>
            </div>
            <div class="text-center">{!! $contest->description !!}</div>
            <div class="text-center">
                {!! Html::link('entries/submit/'.$contest->id, 'Submit', ['class' => 'button small']) !!}
                {!! Html::link('vote/contest/'.$contest->id, 'Vote', ['class' => 'button white small']) !!}
            </div>
            <hr>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
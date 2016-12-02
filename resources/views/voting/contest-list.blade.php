@foreach( $contests as $contest )
    <?php $start = $carbon->parse($contest->start_at) ?>
    <h4>{!! $contest->title !!}</h4>

    @if( $contest->status == 'submission_closed'  || ($contest->status == 'submission_open' && !$contest->entries()->count()) )
        <p>Voting opens in <strong>{!! $carbon->now()->diffForHumans($start, true) !!}</strong>.</p>

    @elseif( $contest->status == 'voting_open' || ($contest->status == 'submission_open' && $contest->entries()->count()) )
        <p>Ends in <strong>{!! $carbon->diffForHumans($carbon->parse($contest->end_at), $carbon->now()) !!}</strong>.</p>

    @elseif( $contest->status == 'awaiting_winners' )
        <p>Voting has ended. Winners will be announced shortly.</p>

    @elseif( $contest->status == 'closed' )
        <p>
            Contest has ended. Congratulations
            @foreach( $contest->winners as $index => $entry )
                {!! Html::link($entry->user->username, $entry->user->username, ['class' => 'text-bold']) .
                ( count($contest->winners) > 1 && $index==count($contest->winners)-2 ? ' and ' : ($index < count($contest->winners)-1 ? ', ' : null) ) !!}
            @endforeach
            !
        </p>
    @else
        {!! dd($contest->status) !!}
    @endif

    <p>
        @if( $carbon->now() < $start )
            {!! Html::image('contests/'.$contest->id.'/'.$contest->banner) !!}
        @else
            <a href="{!! url('vote/contest/'.$contest->id) !!}">
                {!! Html::image('contests/'.$contest->id.'/'.$contest->banner) !!}
            </a>
        @endif
    </p>
    @if( $carbon->now() >= $start )
        <a href="{!! url('vote/contest/'.$contest->id) !!}" class="button white small">Vote</a>
    @endif
    <hr>
@endforeach

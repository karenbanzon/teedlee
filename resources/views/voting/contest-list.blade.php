@foreach( $contests as $contest )
    <?php $start = $carbon->parse($contest->start_at) ?>
    <?php $end = $carbon->parse($contest->end_at) ?>
    <?php $voting_end = $carbon->parse($contest->close_at) ?>
    <?php $is_vote = false; ?>
    <h4>{!! $contest->title !!}</h4>

    @if( $contest->status == 'voting_open' || ($contest->status == 'submission_open' && $contest->entries()->count()) )
        <?php $is_vote = true ?>
        <p>Ends in <strong>{!! $carbon->diffForHumans($end, $carbon->now()) !!}</strong>.</p>

    @elseif( $contest->status == 'submission_closed') )
        <p>Voting opens in <strong>{!! $carbon->now()->diffForHumans($end, true) !!}</strong>.</p>

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
        @if( $is_vote )
            <a href="{!! url('vote/contest/'.$contest->id) !!}">
                {!! Html::image('contests/'.$contest->id.'/'.$contest->banner) !!}
            </a>
            <a href="{!! url('vote/contest/'.$contest->id) !!}" class="button white small">Vote</a>
        @else
            {!! Html::image('contests/'.$contest->id.'/'.$contest->banner) !!}
        @endif
    </p>
    <hr>
@endforeach

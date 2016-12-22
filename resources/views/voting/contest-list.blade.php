@if( isset($contests) )
    @foreach( $contests as $contest )
        <?php $start = $carbon->parse($contest->start_at) ?>
        <?php $end = $carbon->parse($contest->end_at) ?>
        <?php $voting_end = $carbon->parse($contest->close_at) ?>
        <h4>{!! $contest->title !!}</h4>

        @if( $contest->status == 'awaiting_winners' )
            <p>Voting has ended. Winners will be announced shortly.</p>

        @elseif( $contest->status == 'voting_open' || ($contest->status == 'submission_open' && $contest->entries()->count()) )
            <?php $is_vote = true ?>
            <p>Voting ends in <strong>{!! $carbon->diffForHumans($voting_end, $carbon->now()) !!}</strong>.</p>

        @elseif( $contest->status == 'submission_closed'  || ($contest->status == 'submission_open' && !$contest->entries()->count()))
            <p>Voting opens in <strong>{!! $carbon->now()->diffForHumans($end, true) !!}</strong>.</p>

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

        @if( $contest->isVoting() )
            <p>
                <a href="{!! url('vote/contest/'.$contest->id) !!}">{!! Html::image('contests/'.$contest->id.'/'.$contest->banner) !!}</a>
            </p>

            <a href="{!! url('vote/contest/'.$contest->id) !!}" class="button white">Vote</a>
        @else
            <p>{!! Html::image('contests/'.$contest->id.'/'.$contest->banner) !!}</p>
        @endif

        <a href="{!! url('contest/'.$contest->id) !!}" class="button white">Learn more</a>

        <hr>
    @endforeach
@endif
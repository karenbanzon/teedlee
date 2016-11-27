<div class="box box-primary">
    <div class="box-header with-border text-bold">
        {!! $type == 'internal' ? 'Internal' : 'Public' !!} Votes
    </div>

    <div class="box-body">
        <?php $has_voted = false ?>
        @foreach( $entries as $index => $vote )
            <?php $has_voted = !$has_voted && $vote->user->id == \Auth::user()->id; ?>

            <div class="direct-chat-messages">
                <div class="direct-chat-msg {!! $index % 2 == 0 ? 'left' : 'right' !!}">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-{!! $index % 2 == 0 ? 'left' : 'right' !!}">{!! $vote->user->username !!}</span>
                        <span class="direct-chat-timestamp pull-{!! $index % 2 == 0 ? 'right' : 'left' !!}">
                            {!! $vote->created_at !!}
                        </span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="{!! $vote->user->avatar !!}"
                         alt="Message User Image"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {!! stars($vote->rating*1) !!}
                        {!! $vote->comment !!}
                        @if( $vote->flags )
                            <div class="clr">
                                @foreach( json_decode($vote->flags) as $flag )
                                    <small class="label bg-red">{!! $entry->flag_list[$flag-1] !!}</small>&nbsp;
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        @endforeach

        @if( false && !$has_voted )
            <div class="alert alert-warning">
                <p>You haven't cast your vote for this submission yet.</p>
            </div>
            @include('admin.submission.partials.edit.internal-voting-box')
        @endif
    </div>
    <div class="box-footer text-bold">
        Average Rating: {!! str_repeat('<span class="fa fa-star text-yellow"></span>', $entries->avg('rating')) !!}
        ({!! round($entries->avg('rating')) !!} stars / {!! isset($index) ? $index+1 : '0' !!} votes)
    </div>
</div>
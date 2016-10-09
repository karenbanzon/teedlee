<div class="box box-primary">
    <div class="box-header with-border text-bold">
        Public Votes
    </div>
    <div class="box-body">
        <?php $vote = 0; ?>

        @foreach( $submission->votes->public->items as $index => $vote )
            <?php
            $rating += $vote->rating;
            ?>
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
                        {!! stars($vote->rating) !!}
                        {!! $vote->comment !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="box-footer text-bold">
        @if( count($submission->votes->public->items) )
            Average
            Rating: {!! str_repeat('<span class="fa fa-star text-yellow"></span>', $rating/($index+1)) !!}
            ({!! round($rating/($index+1), 2) !!})
        @else
            No votes yet
        @endif
    </div>
    <div class="clr"></div>
</div>
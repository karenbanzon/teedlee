<div class="box box-primary">
    {!! Form::open(['url' => 'vote', 'class' => 'form-horizontal']) !!}
        <div class="box-header with-border text-bold">
            Internal Votes
        </div>

        <div class="box-body">

        @foreach( $submission->votes->internal->items as $index => $vote )
            <?php
            $has_voted = !$has_voted && $vote->user->id == \Auth::user()->id;
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
                            @if( $vote->flags )
                                <div class="clr">
                                    @foreach( json_decode($vote->flags) as $flag )
                                        <small class="label bg-red">{!! $submission->flag_list[$flag-1] !!}</small>
                                        &nbsp;
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

        @endforeach

        @if( !$has_voted )
                <div class="alert alert-warning">
                    <p>You haven't cast your vote for this submission yet.</p>
                </div>

                {!! Form::hidden('submission_id', $submission->id) !!}
                {!! Form::hidden('type', 'internal') !!}
                <div class="form-group">
                    <label for="rating" class="col-sm-2 control-label">Rating</label>
                    <div class="col-sm-2">
                        <input type="number" min="1" max="5" class="form-control" name="rating"
                               value="3" placeholder="Rating" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="comment" class="col-sm-2 control-label">Comment</label>
                    <div class="col-md-8">
                        {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5', 'required' => 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    @foreach($submission->flag_list as $index => $list)
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-10">
                            {!! Form::checkbox('flags[]', $index+1, null) !!}
                            {!! $list !!}
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-10">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
        @endif

        </div>

        {!! Form::close() !!}
</div>
@extends('admin/master')
@section('head')
    {!! Html::style('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{!! $submission->title !!}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div id="draft-images" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($submission->images as $index => $image)
                                    <li data-target="#draft-images" data-slide-to="{!! $index !!}"
                                        class="{!! $index==0 ? 'active' : null !!}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($submission->images as $index => $image)
                                    <div class="item cover {!! $index==0 ? 'active' : null !!}"
                                         style="background-image: url({!! $image->path !!}); height: 400px;">
                                    </div>
                                @endforeach
                            </div>
                            <a class="left carousel-control" href="#draft-images" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                            </a>
                            <a class="right carousel-control" href="#draft-images" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                            </a>
                        </div>

                        <div class="clr">&nbsp;</div>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Artist</b> <a class="pull-right">{!! $submission->user->username !!}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Submitted</b> <a class="pull-right">{!! $submission->created_at !!}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Status</b> <a
                                        class="pull-right">{!! title_case(str_replace('_',' ',$submission->status)) !!}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Orig Artwork</b> <span class="pull-right">
                                    @if( $submission->status == 'orig_artwork_submitted' || $submission->status == 'publication' )
                                        {!! Html::link(url('users/'.$submission->user_id.'/'.$submission->id.'.orig.psd'), 'Download') !!}
                                    @else
                                        None
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="clr"></div>
            </div>
            <div class="col-md-8">
                @if( $submission->status == 'submitted' )
                    <div class="alert alert-info">
                        <p>This submission is new and awaiting to be reviewed.
                            Do you wish to start the internal voting process for this submission?
                        </p>
                        <p><a href="{!! url('admin/submission/promote/'.$submission->id.'/internal_voting') !!}"
                              class="btn btn-sm btn-primary">Approve for Internal Voting</a></p>
                        <div class="clr"></div>
                    </div>

                @elseif( $submission->status == 'publication' )
                    <div class="alert alert-info">
                        <p>
                            This item has been published and is now in production mode.<br/>
                            Don't forget to set the correct Shopify link below for this item.
                        </p>
                    </div>

                    <div class="alert alert-info">
                        {!! Form::open(['url'=>'admin/submission/'.$submission->id.'/shopify-link']) !!}
                        {!! Form::label('shopify_link', 'Shopify link') !!}
                        <div class="input-group">
                            {!! Form::url('shopify_link', $submission->shopify_link, ['class' => 'form-control']) !!}
                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-warning btn-flat">Submit</button>
                                </span>
                        </div>
                        {!! Form::close() !!}
                    </div>

                @elseif( strpos($submission->status, 'internal_voting') !== false || strpos($submission->status, 'orig_artwork') !== false)

                    @if($submission->status == 'internal_voting_fail')
                        <div class="alert alert-danger">
                            <p>Internal voting has failed for this item and was rejected
                                ({!! $submission->votes->internal->average !!} stars).</p>
                            <div class="clr"></div>
                        </div>

                    @elseif( $submission->status == 'awaiting_orig_artwork' )
                        <div class="alert alert-success">
                            <p>
                                Internal voting has ended for this item was successful
                                ({!! $submission->votes->internal->average !!} stars). <br/>
                                System is now waiting for artist to upload original artwork.
                            </p>
                            {{--<p><a href="{!! url('admin/submission/promote/'.$submission->id.'/awaiting_orig_artwork') !!}" class="btn btn-sm btn-warning">Request for original artwork</a></p>--}}
                            <div class="clr"></div>
                        </div>


                    @elseif( $submission->status == 'orig_artwork_submitted' )
                        <div class="alert alert-success">
                            <p>
                                Designer has submitted the original artwork for this item.
                                Approve this item for publication?
                            </p>
                            <p>
                                <a href="{!! url('admin/submission/promote/'.$submission->id.'/publication') !!}"
                                   class="btn btn-sm btn-warning">Approve for publication</a>
                                <a href="{!! url('admin/submission/promote/'.$submission->id.'/awaiting_orig_artwork') !!}"
                                   class="btn btn-sm btn-sm btn-default">Disapprove artwork</a>
                            </p>
                            <div class="clr"></div>
                        </div>

                    @else
                        <div class="alert alert-info">
                            <p>Internal voting has been started for this item and currently awaiting for results which
                                will end on {!! $submission->internal_voting_end !!}</p>
                            <div class="clr"></div>
                        </div>
                    @endif

                    <div class="box box-primary">
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
                                                    <small class="label bg-red">{!! $submission->flag_list[$flag-1] !!}</small>&nbsp;
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

                                {!! \Form::open(['url' => 'vote', 'class' => 'form-horizontal']) !!}
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

                                {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-2 control-label">Flags</label>--}}
                                {{--</div>--}}

                                <div class="form-group">
                                    @foreach($submission->flag_list as $index => $list)
                                    <div class="col-sm-2">&nbsp;</div>
                                    <div class="col-sm-10">
                                        {!! Form::checkbox('flags[]', $index+1, null) !!}
                                        {!! $list !!}
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                @endif

            </div>
            <div class="box-footer text-bold">
                Average
                Rating: {!! str_repeat('<span class="fa fa-star text-yellow"></span>', $rating/($index+1)) !!}
                ({!! round($rating/($index+1), 2) !!})
            </div>
            <div class="clr"></div>
        </div>

        @elseif( strpos($submission->status, 'public_voting') !== false )
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
                    Average
                    Rating: {!! str_repeat('<span class="fa fa-star text-yellow"></span>', $rating/($index+1)) !!}
                    ({!! round($rating/($index+1), 2) !!})
                </div>
                <div class="clr"></div>
            </div>
            @endif
            </div>
            <div class="clr"></div>
            </div>
            <div class="clr"></div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function () {
        });
    </script>
@endsection
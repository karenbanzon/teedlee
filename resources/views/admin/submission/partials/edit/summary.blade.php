<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            @if( $submission->contest_id )
                <div class="small text-muted">{!! $submission->contest->title !!}</div>
            @endif
            {!! $submission->title !!}
        </h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="draft-images" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($submission->images as $index => $image)
                    <li data-target="#draft-images" data-slide-to="{!! $index !!}" class="{!! $index==0 ? 'active' : null !!}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($submission->images as $index => $image)
                    <div class="item cover {!! $index==0 ? 'active' : null !!}" style="background-image: url({!! $image->path !!}); height: 400px;"></div>
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
                <b>Orig Artwork</b>
                <span class="pull-right">
                    @if( $submission->status == 'orig_artwork_submitted' || $submission->status == 'publication' )
                        {!! Html::link(url('users/'.$submission->user_id.'/'.$submission->id.'.orig.psd'), 'Download', ['target' => '_blank']) !!}
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
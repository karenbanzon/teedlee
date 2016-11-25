@foreach($submissions as $status => $group)
    <div class="card small-12">
        <h6>{!! $status !!}</h6>

        @if( $status == 'Published' )

            <table style="width: 100%;">
                <thead>
                <tr>
                    <th>Design</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group as $submission)
                    <tr>
                        <td width="25%">
                            @if( isset($submission->images[0]) )
                                {!! Html::image($submission->images[0]->path, null, []) !!}
                            @endif
                            @if($submission->status=='orig_artwork_submitted')
                                <div class="small">
                                    <a href="{!! url('users/'.\Auth::user()->id.'/'.$submission->id.'.orig.psd') !!}" target="_blank">
                                        <span class="fa fa-fw fa-cloud-download"></span> Original artwork
                                    </a>
                                </div>
                            @endif
                        </td>
                        <td>
                            {!! $submission->contest_id !!}
                            @if( $submission->contest_id )
                                <div class="label label-warning">{!! $submission->contest->title !!}</div>
                            @endif
                        </td>
                        <td>{!! date('d M Y', strtotime($submission->created_at)) !!}</td>
                        <td>
                            {!! Form::open(['url' => url('user/submissions/'.$submission->id.'/artwork'), 'files' => true]) !!}
                            @if( $submission->shop_status == 'Published' )
                                <a href="{!! shop_url($submission->slug) !!}" class="button tiny white" target="_blank">View in shop</a>
                            @elseif( $submission->shop_status == 'Pending Original Artwork' )
                                <a href="#" class="button tiny white upload-trigger" rel="#artwork-{!! $submission->id !!}" data-id="{!! $submission->id !!}">Submit</a>
                                {!! Form::file('artwork', ['class' => 'hidden hide', 'accept' => '.psd,.ai,eps', 'id' => 'artwork-'.$submission->id]) !!}
                            @endif
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @elseif( $status == 'Pending Original Artwork' )
            <small>Original artwork should be in <span class="label-pill hollow">PSD</span> , <span class="label-pill hollow">AI</span> , or <span class="label-pill hollow">EPS</span>. Maximum file size is <strong>20MB</strong>.</small>
            <table style="width: 100%;">
                <thead>
                <tr>
                    <th>Design</th>
                    <th>Title</th>
                    <th>Date Submitted</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group as $submission)
                    <tr>
                        <td width="25%">
                            @if( isset($submission->images[0]) )
                                {!! Html::image($submission->images[0]->path, null, []) !!}
                            @endif
                            @if($submission->status=='orig_artwork_submitted')
                                <div class="small">
                                    <a href="{!! url('users/'.\Auth::user()->id.'/'.$submission->id.'.orig.psd') !!}" target="_blank">
                                        <span class="fa fa-fw fa-cloud-download"></span> Original artwork
                                    </a>
                                </div>
                            @endif
                        </td>
                        <td>
                            {!! $submission->title !!}
                            @if( $submission->contest_id )
                                <div>({!! $submission->contest->title !!})</div>
                            @endif
                        </td>
                        <td>
                            @if( $submission->status == 'awaiting_orig_artwork')
                                Pending original artwork
                            @elseif( $submission->status == 'orig_artwork_submitted' )
                                Under review
                            @elseif( $submission->status == 'orig_artwork_declined' )
                                Resubmission needed
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['url' => url('user/submissions/'.$submission->id.'/artwork'), 'files' => true]) !!}
                            @if( $submission->shop_status == 'Published' )
                                <a href="{!! shop_url($submission->title) !!}" class="button tiny white">View in shop</a>
                            @elseif( $submission->shop_status == 'Pending Original Artwork' )
                                <a href="#" class="button tiny white upload-trigger" rel="#artwork-{!! $submission->id !!}" data-id="{!! $submission->id !!}">Submit</a>
                                {!! Form::file('artwork', ['class' => 'hidden hide', 'accept' => '.psd,.ai,eps', 'id' => 'artwork-'.$submission->id]) !!}
                            @endif
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @elseif( $status == 'For Voting' )
            <table style="width: 100%;">
                <thead>
                <tr>
                    <th>Design</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group as $submission)
                    <tr>
                        <td width="25%">
                            @if( isset($submission->images[0]) )
                                {!! Html::image($submission->images[0]->path, null, []) !!}
                            @endif
                            @if($submission->status=='orig_artwork_submitted')
                                <div class="small">
                                    <a href="{!! url('users/'.\Auth::user()->id.'/'.$submission->id.'.orig.psd') !!}" target="_blank">
                                        <span class="fa fa-fw fa-cloud-download"></span> Original artwork
                                    </a>
                                </div>
                            @endif
                        </td>
                        <td>
                            {!! $submission->title !!}
                            @if( $submission->contest_id )
                                <div>({!! $submission->contest->title !!})</div>
                            @endif
                        </td>
                        <td>
                            {!! strpos($submission->status, 'internal') !== false ? 'Internal' : 'Public' !!} Voting
                        </td>
                        <td>
                            {!! strpos($submission->status, 'internal') !== false ? $submission->internal_voting_end : $submission->public_voting_end !!}
                        </td>
                        <td>
                            @if( $submission->status == 'public_voting' )
                                <a href="{!! url('vote/'.$submission->id.'/fb') !!}" class="fb-share button tiny white" target="_blank">Share</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @elseif( $status == 'Under Review' )
            <table style="width: 100%;">
                <thead>
                <tr>
                    <th>Design</th>
                    <th>Title</th>
                    <th>Date Submitted</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group as $submission)
                    <tr>
                        <td width="25%">
                            @if( isset($submission->images[0]) )
                                {!! Html::image($submission->images[0]->path, null, []) !!}
                            @endif
                            @if($submission->status=='orig_artwork_submitted')
                                <div class="small">
                                    <a href="{!! url('users/'.\Auth::user()->id.'/'.$submission->id.'.orig.psd') !!}" target="_blank">
                                        <span class="fa fa-fw fa-cloud-download"></span> Original artwork
                                    </a>
                                </div>
                            @endif
                        </td>
                        <td>
                            {!! $submission->title !!}
                            @if( $submission->contest_id )
                                <div>({!! $submission->contest->title !!})</div>
                            @endif
                        </td>
                        <td>
                            {!! $submission->created_at !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @elseif( $status == 'Declined' )
            <table style="width: 100%;">
                <thead>
                <tr>
                    <th>Design</th>
                    <th>Title</th>
                    <th>Reason</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group as $submission)
                    <tr>
                        <td width="25%">
                            @if( isset($submission->images[0]) )
                                {!! Html::image($submission->images[0]->path, null, []) !!}
                            @endif
                            @if($submission->status=='orig_artwork_submitted')
                                <div class="small">
                                    <a href="{!! url('users/'.\Auth::user()->id.'/'.$submission->id.'.orig.psd') !!}" target="_blank">
                                        <span class="fa fa-fw fa-cloud-download"></span> Original artwork
                                    </a>
                                </div>
                            @endif
                        </td>
                        <td>
                            {!! $submission->title !!}
                            @if( $submission->contest_id )
                                <div>({!! $submission->contest->title !!})</div>
                            @endif
                        </td>
                        <td>
                            {!! $submission->declined_reason !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            'Wew'
        @endif

        <div>&nbsp;</div>
    </div>
@endforeach
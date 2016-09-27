@extends('master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <section class="row">
        <div class="small-12 large-8 large-offset-2">
            <hr>
            <h4 class="text-center">My Account</h4>
            <hr>
        </div>
        <div class="small-12">
            @include('user/sidebar')
            <div class="card small-12 large-10 padding-20">
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
                                        {!! $submission->title !!}
                                    </td>
                                    <td>{!! date('d M Y', strtotime($submission->created_at)) !!}</td>
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

                    @elseif( $status == 'Pending Original Artwork' )
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
                                    </td>
                                    <td>
                                        {!! strpos($submission->status, 'internal') !== false ? 'Internal' : 'Public' !!}
                                    </td>
                                    <td>
                                        {!! strpos($submission->status, 'internal') !== false ? $submission->internal_voting_end : $submission->public_voting_end !!}
                                    </td>
                                    <td>
                                        @if( $submission->status == 'public_voting' )
                                            <a href="{!! url('vote/'.$submission->id) !!}" class="fb-share button tiny white" target="_blank">Share</a>
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
            </div>
        </div>
    </section>
@endsection
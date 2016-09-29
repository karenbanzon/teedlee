@extends('admin/master')
@section('head')
    {!! Html::style('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                @include('admin.submission.partials.edit.summary')
            </div>

            <div class="col-md-8">
                @if( $submission->status == 'submitted' )
                    @include('admin.submission.partials.edit.submitted')

                @elseif( $submission->status == 'publication' )
                    @include('admin.submission.partials.edit.publication')

                @elseif( strpos($submission->status, 'orig_artwork') !== false)
                    @if( $submission->status == 'awaiting_orig_artwork' )
                        @include('admin.submission.partials.edit.orig-artwork-awating')

                    @elseif( $submission->status == 'orig_artwork_submitted' )
                        @include('admin.submission.partials.edit.orig-artwork-submitted')

                    @elseif( $submission->status == 'orig_artwork_resubmit' )
                        @include('admin.submission.partials.edit.orig-artwork-resubmit')

                    @elseif( $submission->status == 'orig_artwork_declined' )
                        @include('admin.submission.partials.edit.orig-artwork-declined')

                    @endif

                @elseif( strpos($submission->status, 'internal_voting') !== false)
                    @if($submission->status == 'internal_voting_fail')
                        @include('admin.submission.partials.edit.internal-voting-fail')
                    @else
                        @include('admin.submission.partials.edit.internal-voting')
                    @endif
                @elseif( strpos($submission->status, 'public_voting') !== false )
                    @if( $submission->status == 'public_voting_success' )
                        @include('admin.submission.partials.edit.public-voting-success')

                    @elseif( $submission->status == 'public_voting_fail' )
                        @include('admin.submission.partials.edit.public-voting-fail')

                    @endif

                    @include('admin.submission.partials.edit.public-voting')
                @else
                    Error: Unknown status
                @endif
            </div>
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
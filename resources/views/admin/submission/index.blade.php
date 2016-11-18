@extends('admin/master')
@section('head')
    {!! Html::style('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Submissions - {!! $title !!}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="submissions" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th colspan="2">Submission</th>
                            <th>Artist</th>
                            <th>Date Submitted</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $submissions as $submission)
                        <tr>
                            <td width="1">{!! Html::image(isset($submission->images[0]) ? $submission->images[0]->path : null, '', ['width' => '45px']) !!}</td>
                            <td class="text-bold">
                                @if( $submission->contest_id )
                                    <div class="small text-muted text-normal">{!! $submission->contest->title !!}</div>
                                @endif
                                {!! $submission->title !!}<br/>
                                <small class="label label-{!! $submission->status_style !!}">{!! c($submission->status) !!}</small>
                                @if( strpos($submission->status, 'internal_voting') !== false )
                                <small class="label">{!! stars($submission->votes->internal->average) !!}</small>
                                @endif
                                @if( strpos($submission->status, 'public_voting') !== false )
                                    <small class="label">{!! stars($submission->votes->public->average) !!}</small>
                                @endif
                            </td>
                            <td>{!! $submission->user->username !!}</td>
                            <td>{!! $submission->created_at !!}</td>
                            <td class="h4 text-center">
                                <a href="{!! url('admin/submission/'.$submission->id.'/edit') !!}"><span class="fa fa-pencil"></span></a>&nbsp;
                                {{--<a href="#"><span class="fa fa-eye"></span></a>--}}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="2">Submission</th>
                            <th>Artist</th>
                            <th>Date Submitted</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('scripts')
    {!! Html::script('bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') !!}
<script>
    $(function () {
        $("#submissions").DataTable({
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    });
</script>
@endsection
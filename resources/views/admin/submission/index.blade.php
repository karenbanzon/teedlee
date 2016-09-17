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
                            {{--<th>Actions</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $submissions as $submission)
                        <tr>
                            <td width="1">{!! Html::image($submission->images[0]->path, '', ['width' => '45px']) !!}</td>
                            <td class="text-bold">
                                <p>
                                    {!! $submission->title !!}
                                </p>
                                <small class="label alert-{!! $submission->status_style !!}">{!! $submission->shop_status !!}</small>
                            </td>
                            <td>{!! $submission->user->username !!}</td>
                            <td>{!! $submission->created_at !!}</td>
                            {{--<td>&nbsp;</td>--}}
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="2">Submission</th>
                            <th>Artist</th>
                            <th>Date Submitted</th>
                            {{--<th>Actions</th>--}}
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
            "autoWidth": false
        });
    });
</script>
@endsection
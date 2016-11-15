@extends('admin/master')
@section('head')
    {!! Html::style('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Contests</h3>
                    <span class="pull-right"><a href="{!! url('admin/contest/create') !!}" class="btn btn-primary">New Contest</a></span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="submissions" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th colspan="2">Contest</th>
                            <th>Start</th>
                            <th>End</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $contests as $contest)
                        <tr>
                            <td width="1">{!! Html::image('contests/'.$contest->banner, '', ['width' => '45px']) !!}</td>
                            <td class="text-bold">
                                {!! $contest->title !!}
                            </td>
                            <td>{!! $contest->start !!}</td>
                            <td>{!! $contest->end !!}</td>
                            <td class="h4 text-center">
                                <a href="{!! url('admin/contest/'.$contest->id.'/edit') !!}"><span class="fa fa-pencil"></span></a>&nbsp;
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="2">Contest</th>
                            <th>Start</th>
                            <th>End</th>
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
        $("#contests").DataTable({
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    });
</script>
@endsection
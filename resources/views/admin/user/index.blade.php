@extends('admin/master')
@section('head')
    {!! Html::style('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="{!! url('admin/user/create') !!}" class="btn btn-primary pull-right"><span class="fa fa-user-plus"></span> New User</a>
                    <table id="submissions" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th colspan="2">User</th>
                            <th>Group</th>
                            <th>Date Joined</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $users as $user)
                        <tr>
                            <td width="1">{!! Html::image($user->avatar, '', ['width' => '45px']) !!}</td>
                            <td class="text-bold">
                                <p>{!! $user->username !!}</p>
                            </td>
                            <td>{!! $user->user_group->name !!}</td>
                            <td>{!! $user->created_at !!}</td>
                            <td class="h4 text-center">
                                <a href="{!! url('admin/user/'.$user->id.'/edit') !!}"><span class="fa fa-pencil"></span></a>&nbsp;
                                <a href="#"><span class="fa fa-eye"></span></a>
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
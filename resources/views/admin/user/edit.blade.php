@extends('admin/master')
@section('head')
    {!! Html::style('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($user, ['url' => 'admin/user', 'class' => 'form-horizontal']) !!}
            {!! Form::hidden('id') !!}
            {!! Form::hidden('user_group_id') !!}
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="col-md-6">
                        <img class="profile-user-img img-responsive img-circle" src="{!! $user->avatar !!}" alt="User profile picture">
                        <h3 class="profile-username text-center">{!! $user->username !!}</h3>
                        <p class="text-muted text-center">{!! $user->user_group->name !!}</p>

                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">User Profile</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">Email</label>

                                    <div class="col-sm-9">
                                        {!! Form::email('email', null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-sm-3 control-label">User Name</label>
                                    <div class="col-sm-9">
                                        {!! Form::text('username', null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-sm-3 control-label">First Name</label>
                                    <div class="col-sm-9">
                                        {!! Form::text('firstname', null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-3 control-label">Last Name</label>
                                    <div class="col-sm-9">
                                        {!! Form::text('lastname', null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-9">
                                        {!! Form::text('phone', null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-3 control-label">Mobile</label>
                                    <div class="col-sm-9">
                                        {!! Form::text('mobile', null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="col-sm-3 control-label">Gender</label>
                                    <div class="col-sm-9">
                                        {!! Form::select('gender', [ 'male' => 'Male', 'female' => 'Female' ], null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address" class="col-sm-3 control-label">Street</label>
                                    <div class="col-sm-9">
                                        {!! Form::text('address', null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address2" class="col-sm-3 control-label">Suburb/Village</label>
                                    <div class="col-sm-9">
                                        {!! Form::text('address2', null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="city" class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        {!! Form::select('city_id', $cities, null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="province" class="col-sm-3 control-label">Province</label>
                                    <div class="col-sm-9">
                                        {!! Form::select('province_id', $provinces, null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="about_me" class="col-sm-3 control-label">About Me</label>
                                    <div class="col-sm-9">
                                        {!! Form::textarea('about_me', null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="website" class="col-sm-3 control-label">Website</label>
                                    <div class="col-sm-9">
                                        {!! Form::text('website', null, [ 'class' => "form-control" ]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="website" class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-primary clr"><b>Save</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        {{--<ul class="list-group list-group-unbordered">--}}
                            {{--<li class="list-group-item">--}}
                                {{--<b>Followers</b> <a class="pull-right">1,322</a>--}}
                            {{--</li>--}}
                            {{--<li class="list-group-item">--}}
                                {{--<b>Following</b> <a class="pull-right">543</a>--}}
                            {{--</li>--}}
                            {{--<li class="list-group-item">--}}
                                {{--<b>Friends</b> <a class="pull-right">13,287</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
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
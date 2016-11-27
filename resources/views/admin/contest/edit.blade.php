@extends('admin/master')
@section('head')
    {{--{!! Html::style('bower_components/AdminLTE/plugins/datepicker/datepicker3.css') !!}--}}
    {!! Html::style('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
    {!! Html::style('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    {!! Form::model($contest, ['url' => 'admin/contest', 'class' => 'form-horizontal', 'files' => true]) !!}
    <div class="row">
        <div class="col-xs-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Contests</h3>
                </div>

                <div class="box-body">
                    {!! Form::hidden('id') !!}

                    @if( $contest->banner )
                        {!! \Html::image("contests/{$contest->banner}", null, ['width' => '100%', 'class' => 'thumbnail']) !!}
                        <p>&nbsp;</p>
                    @endif

                    <div class="form-group">
                        <label for="banner" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-9">
                            {!! Form::file('banner', null, [ 'class' => "form-control" ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('title', null, [ 'class' => "form-control" ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('description', null, [ 'class' => "form-control" ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="start_at" class="col-sm-2 control-label">Submission</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        {!! Form::text('start_at', null, [ 'class' => "form-control", 'placeholder' => 'Opens on' ]) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        {!! Form::text('end_at', null, [ 'class' => "form-control", 'placeholder' => 'Closes on' ]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="close_at" class="col-sm-2 control-label">Voting Ends</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {!! Form::text('close_at', null, [ 'class' => "form-control", 'placeholder' => 'Ends on' ]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="clr">&nbsp;</div>

                    <div class="form-group">
                        <label for="website" class="col-sm-2 control-label">&nbsp;</label>
                        <div class="col-sm-9">
                            <button class="btn btn-primary btn-lg clr"><b>{!! $contest->id ? 'Update' : 'Create' !!} Contest</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Judges</h3>
                </div>
                <div class="box-body" id="judges">
                    @foreach($judges as $judge)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="judge[]" value="{!! $judge->id !!}" {!! $contest->judges->where('user_id', $judge->id)->count() ? 'checked="checked"' : null !!} >
                                <span>{!! $judge->username !!}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
                <div>&nbsp;</div>
            </div>

            <div class="box create-judge">
                <div class="box-header">
                    <h3 class="box-title">New Judge</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus text-orange"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::text(null, null, [ 'class' => "form-control", 'placeholder' => 'User Name', 'id' => 'username' ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::email(null, null, [ 'class' => "form-control", 'placeholder' => 'Email', 'id' => 'email' ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::password(null, [ 'class' => "form-control", 'placeholder' => 'Password', 'id' => 'password' ]) !!}
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary clr" id="btnCreateJudge"><b>Create</b></button>
                    <div>&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}


    {{--Entries--}}
    @if( $contest->id )
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Entries</h3>
                </div>
                <div class="box-body">
                    <table id="entries" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th colspan="2">Entries</th>
                            <th>Artist</th>
                            <th>Status</th>
                            <th>Rating</th>
                            <th>Submitted</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $contest->entries->where('status', '<>', 'draft') as $entry)
                            <tr>
                                <td width="1">
                                    {!! Html::image($entry->images[0]->path, '', ['width' => '45px']) !!}
                                </td>
                                <td class="text-bold">
                                    {!! $entry->title !!}
                                </td>
                                <td>
                                    {!! $entry->user->username !!}
                                </td>
                                <td>{!! $entry->status !!}</td>
                                <td>{!! $entry->rating !!} stars / {!! $entry->votes->count() !!} votes</td>
                                <td>{!! $carbon->parse($entry->created_at)->toFormattedDateString() !!}</td>
                                <td class="h4 text-center">
                                    <a href="{!! url('admin/entries/'.$entry->id.'/edit') !!}"><span class="fa fa-pencil" title="Edit"></span></a>&nbsp;
                                    {{--<a href="{!! url('admin/entries/'.$contest->id) !!}"><span class="fa fa-cloud-upload" title="Entries"></span></a>&nbsp;--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="2">Entries</th>
                            <th>Artist</th>
                            <th>Status</th>
                            <th>Rating</th>
                            <th>Submitted</th>
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
    @endif


@endsection

@section('scripts')
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js') !!}
    {!! Html::script('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
    {!! Html::script('bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') !!}
    <script>
        $(function () {
            $("textarea").wysihtml5();

            $('[name="start_at"], [name="end_at"], [name="close_at"]').datetimepicker({
                format: 'YYYY-MM-DD HH:ss',
//                autoclose: true
            });

            $('#btnCreateJudge').click(function(){
                $.ajax({
                    type: 'POST',
                    url: '{!! url('api/judge') !!}',
                    data: {
                        username: $('#username').val(),
                        email: $('#email').val(),
                        password: $('#password').val(),
                    },
                    dataType: 'json',
                })
                .done(function(data){
                    var template = $('#judges div:last-child').clone();
                    template.find('input[type="checkbox"]').val(data.id).attr('checked','checked');
                    template.find('span').html(data.username).addClass('text-primary text-bold');
                    $('#judges').append(template);
                    $('#username, #email, #password').val('');
                    $('.create-judge button[data-widget="collapse"]').click();
                    alert('User ' + data.username + ' created and added to list of judges.');
                })
                .fail(function(err){
                    var msg = '';
                    for(var i in err.responseJSON)
                    {
                        msg += err.responseJSON[i] + "\r";
                    }

                    alert(msg);
                });
            });
        });
    </script>
@endsection
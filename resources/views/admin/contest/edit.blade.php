@extends('admin/master')
@section('head')
    {!! Html::style('bower_components/AdminLTE/plugins/datepicker/datepicker3.css') !!}
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
                        <label for="banner" class="col-sm-3 control-label">Banner Image</label>
                        <div class="col-sm-6">
                            {!! Form::file('banner', null, [ 'class' => "form-control" ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-6">
                            {!! Form::text('title', null, [ 'class' => "form-control" ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-6">
                            {!! Form::textarea('description', null, [ 'class' => "form-control" ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Submission</label>
                        <div class="col-sm-6">
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
                        <label for="description" class="col-sm-3 control-label">Voting</label>
                        <div class="col-sm-3">
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
                        <label for="website" class="col-sm-3 control-label">&nbsp;</label>
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
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    {!! Html::script('bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') !!}
    <script>
        $(function () {
            $('[name="start_at"], [name="end_at"], [name="close_at"]').datepicker({
                autoclose: true
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
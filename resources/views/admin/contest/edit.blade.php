@extends('admin/master')
@section('head')
    {!! Html::style('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') !!}
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
                            {!! Form::textarea('title', null, [ 'class' => "form-control" ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Start</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {!! Form::text('start', null, [ 'class' => "form-control" ]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">End</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {!! Form::text('end', null, [ 'class' => "form-control" ]) !!}
                            </div>
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

        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Judges</h3>
                </div>
                <div class="box-body">
                    @foreach($judges as $judge)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="judge[]" value="{!! $judge->id !!}" {!! $contest->judges->where('user_id', $judge->id)->count() ? 'checked="checked"' : null !!} > {!! $judge->username !!}
                            </label>
                        </div>
                    @endforeach
                    <div>&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
    {!! Html::script('bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    {!! Html::script('bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') !!}
    <script>
        $(function () {
            $('#start, #end').datepicker({
                autoclose: true
            });
        });
    </script>
@endsection
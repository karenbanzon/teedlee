@extends('master')
@section('content')
    <section class="row">
        <div class="small-12 large-8 large-offset-2">
            <hr>
            <h4 class="text-center">Submit</h4>
            <hr>
        </div>
        <div class="small-12">
            @include('user/sidebar')
            {!! Form::model($submission, ['url' => 'submissions/'.$submission->id, 'method' => 'PUT']) !!}
            <input type="hidden" value="PUT" name="_method">
            <div class="card small-12 medium-10 padding-20">
                <div class="profile-detail field-editor" rel="title">
                    <h6 class="label">Title</h6>
                    <div class="profile-entry alias field-editor-preview">
                        <span class="profile-entry-data">{!! old('title', $submission->title) !!}</span>
                        <a class="profile-action action" href="#" data-target="title"><span class="icon icon-pencil"></span></a>
                    </div>
                    <div class="profile-entry editing field-editor-input">
                        {!! Form::text('title', null, ['placeholder' => 'Title']) !!}
                        <button class="small action">Done</button>
                    </div>
                </div>

                <div class="profile-detail">
                    <h6 class="label vtop">Images</h6>
                    <div class="profile-entry">
                        <div id="uploader" class="dropzone">
                            <div class="dz-message needsclick">
                                Drop image files here or click to upload.<br>
                                {{--<span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-detail">
                    <h6 class="label"><button type="submit">Submit</button></h6>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@section('scripts')

    {!! Html::script('bower_components/dropzone/dist/min/dropzone.min.js') !!}
    {!! Html::style('bower_components/dropzone/dist/min/dropzone.min.css') !!}
    {!! Html::style('bower_components/dropzone/dist/min/basic.min.css') !!}
    <script>
        Dropzone.autoDiscover=false;

        $(function() {
            $("div#uploader").dropzone({
                url: "{!! secure_url('submission-image') !!}",
                sending: function(file, xhr, formData) {
                    formData.append("_token", $('input[name="_token"]').val());
                    formData.append("submission_id", {!! $submission->id !!});
                },
            });
        } );
    </script>
@endsection
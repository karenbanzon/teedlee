@extends('master')

@section('title')
    T-Shirt Design Form
@endsection

@section('head')
    {!! Html::style('bower_components/dropzone/dist/min/dropzone.min.css') !!}
    {!! Html::style('bower_components/dropzone/dist/min/basic.min.css') !!}
@endsection

@section('content')
    <section class="row">
        <div class="small-12 large-8 large-offset-2">
            <hr>
            <h4 class="text-center">Submit</h4>
            <hr>
        </div>
        <div class="small-12">
            @include('user/sidebar')
            <div class="card small-12 large-8">
                {!! Form::model($submission, ['url' => 'submissions/'.$submission->id, 'method' => 'PUT']) !!}
                <input type="hidden" value="PUT" name="_method">
                <div class="card small-12 padding-20">
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
                                    <p class="text-blue"><strong>Drop image files here or click to upload</strong></p>
                                    <span class="small">Note: 3 images maximum per design.<br/>Only JPG and PNG files with the original submission template size of 756 x 1000 px size will be accepted.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="profile-detail text-center">
                        <h6 class="label"><button type="submit">Submit</button></h6>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    {!! Html::script('bower_components/dropzone/dist/min/dropzone.min.js') !!}
    <script>
        Dropzone.autoDiscover=false;

        $(function() {
            var maxImageWidth = 756, maxImageHeight = 1000;

            $("div#uploader").dropzone({
                acceptedFiles: "image/jpg,image/jpeg,image/png",
                url: "{!! secure_url('submission-image') !!}",
                maxFiles: 3,
                minFiles: 1,

                init: function() {
                    this.on("thumbnail", function(file) {
                        if (file.width != maxImageWidth || file.height != maxImageHeight) {
                            file.rejectDimensions();
                        }
                        else {
                            file.acceptDimensions();
                        }
                    });
                },

                accept: function(file, done) {
                    file.acceptDimensions = done;
                    file.rejectDimensions = function() { done("Invalid dimension."); };
                },

                sending: function(file, xhr, formData) {
                    formData.append("_token", $('input[name="_token"]').val());
                    formData.append("submission_id", {!! $submission->id !!});
                },
            });
        } );
    </script>
@endsection
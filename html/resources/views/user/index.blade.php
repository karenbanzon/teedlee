@extends('master')
@section('content')
    <section class="row">
        <div class="small-12 large-8 large-offset-2">
            <hr>
            <h4 class="text-center">My Account</h4>
            <hr>
        </div>
        <div class="small-12">
            @include('user/sidebar')
            {!! Form::model($user, ['url' => 'user/update', 'files' => true]) !!}
            <div class="card small-12 medium-10 padding-20">
                <div class="profile-detail">
                    <h6 class="label">Photo</h6>
                    <div class="profile-entry photo">
                        <label for="avatar">
                            {!! Html::image($user->avatar ?: 'http://placehold.it/150x150', null, ['id' => 'avatar-preview']) !!}
                            <label for="avatar" type="button" class="button small white">Upload new</label>
                            {{--<input type="file" name="avatar" id="avatar" style="display: none;">--}}
                            {!! Form::file('avatar', ['id'=> 'avatar', 'style'=> 'display: none']) !!}
                        </label>
                    </div>
                </div>

                <div class="profile-detail field-editor" rel="email">
                    <h6 class="label">Email</h6>
                    <div class="profile-entry alias field-editor-preview">
                        <span class="profile-entry-data">{!! old('email', $user->email) !!}</span>
                        <a class="profile-action action" href="#" data-target="email"><span class="icon icon-pencil"></span></a>
                    </div>
                    <div class="profile-entry editing field-editor-input">
                        {{--<input type="text" name="username" placeholder="Username" value="juanjose">--}}
                        {!! Form::text('email', null, ['placeholder' => 'Email']) !!}
                        <button class="small action">Done</button>
                    </div>
                </div>

                <div class="profile-detail field-editor" rel="username">
                    <h6 class="label">Username</h6>
                    <div class="profile-entry alias field-editor-preview">
                        <span class="profile-entry-data">{!! old('username',$user->username) !!}</span>
                        <a class="profile-action action" href="#" data-target="username"><span class="icon icon-pencil"></span></a>
                    </div>
                    <div class="profile-entry field-editor-input">
                        {{--<input type="text" name="username" placeholder="Username" value="juanjose">--}}
                        {!! Form::text('username', null, ['placeholder' => 'Username']) !!}
                        <button class="small action">Done</button>
                    </div>
                </div>

                <div class="profile-detail field-editor" rel="firstname">
                    <h6 class="label">First Name</h6>
                    <div class="profile-entry alias field-editor-preview">
                        <span class="profile-entry-data">{!! old('firstname',$user->firstname) !!}</span>
                        <a class="profile-action action" href="#"><span class="icon icon-pencil"></span></a>
                    </div>
                    <div class="profile-entry field-editor-input">
                        {{--<input type="text" name="firstname" placeholder="John" value="Juan Jose">--}}
                        {!! Form::text('firstname', null, ['placeholder' => 'John']) !!}
                        <button class="small action">Done</button>
                    </div>
                </div>

                <div class="profile-detail field-editor" rel="lastname">
                    <h6 class="label">Last Name</h6>
                    <div class="profile-entry alias field-editor-preview">
                        <span class="profile-entry-data">{!! old('lastname',$user->lastname) !!}</span>
                        <a class="profile-action action" href="#"><span class="icon icon-pencil"></span></a>
                    </div>
                    <div class="profile-entry field-editor-input">
                        {{--<input type="text" name="lastname" placeholder="Last Name" value="Juan Jose">--}}
                        {!! Form::text('lastname', null, ['placeholder' => 'Doe']) !!}
                        <button class="small action">Done</button>
                    </div>
                </div>

                <div class="profile-detail field-editor" rel="website">
                    <h6 class="label">Website</h6>
                    <div class="profile-entry website field-editor-preview">
                        <span class="profile-entry-data">{!! old('website',$user->website) !!}</span>
                        <a class="profile-action action" href=""><span class="icon icon-pencil"></span></a>
                    </div>
                    <div class="profile-entry field-editor-input">
                        {{--<input type="url" placeholder="Website" name="website" value="http://www.juanjose.com">--}}
                        {!! Form::text('website', $user->website, ['placeholder' => 'http://johndoe.com']) !!}
                        <button class="small action">Done</button>
                    </div>
                </div>

                <div class="profile-detail field-editor" rel="about_me">
                    <h6 class="label">About Me</h6>
                    <div class="profile-entry website field-editor-preview">
                        <span class="profile-entry-data">{!! old('about_me',$user->about_me) !!}</span>
                        <a class="profile-action action" href=""><span class="icon icon-pencil"></span></a>
                    </div>
                    <div class="field-editor-input profile-entry editing">
                        <small class="counter">300 characters left</small>
                        {{--<textarea rows="5" name="about_me" placeholder="About me">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</textarea>--}}
                        {!! Form::textarea('about_me') !!}
                        <button class="small action">Done</button>
                    </div>
                </div>

                <div class="profile-detail">
                    <h6 class="label">Profile URL</h6>
                    <div class="profile-entry website">
                        <span class="profile-entry-data"><a href="{!! url(old('username',$user->username)) !!}" target="_blank">{!! url($user->username) !!}</a></span>
                    </div>
                </div>

                <div class="profile-detail">
                    <h6 class="label"><button type="submit">Save</button></h6>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function(){
            $('#avatar-trigger').click(function(){
                $('[name="avatar-trigger"]').click();
            });

            $('#avatar').change(function(){
                imgInputPreview($(this), $('#avatar-preview'));
            });
        });
    </script>
@endsection
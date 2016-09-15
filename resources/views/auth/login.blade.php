@extends('master')
@section('content')
    <section class="row">
        <div class="small-12 medium-8 medium-offset-2">
            <hr>
            <h4 class="text-center">Login to your Teedlee account</h4>
            <hr>

            <div class="form-field block text-center">
                <a href="{!! url('oauth/facebook') !!}">
                    {!! Html::image('https://z-1-scontent.fmnl3-2.fna.fbcdn.net/t39.2178-6/851579_209602122530903_1060396115_n.png') !!}
                </a>
            </div>

            <div class="card small-12 medium-8 medium-offset-2">
                <div class="card-container padding-20">
                    {!! Form::open(['url' => 'auth']) !!}
                        {!! Form::hidden('redirect', $redirect) !!}
                        <div class="form-field block">
                            <label>Username/Email</label>
                            <input type="text" name="email" placeholder="johndoe" required>
                        </div>
                        <div class="form-field block">
                            <label>Password</label>
                            <input type="password" name="password" required>
                        </div>
                        <button type="submit" class="pull-left">Login</button>
                        <a href="{!! url('signup') !!}" class="pull-right">Create an account</a>
                    {!! Form::close() !!}
                </div>
                <div class="text-center">
                Don't have an account yet?
                <br>
                <a href="{!! url('signup') !!}" class="show-for-large">Sign Up here.</a>
            </div>
            </div>
        </div>
    </section>
@endsection
@extends('master')

@section('title')
    Teedlee Log In
@endsection

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
                            <label>Email</label>
                            <input type="text" name="email" placeholder="mail@server.com" required>
                        </div>
                        <div class="form-field block">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="pull-left">Login</button>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="text-center small-12 medium-8 medium-offset-2">
                Don't have an account yet?<br>
                <a href="{!! url('signup') !!}">Sign up here.</a>
            </div>
            <div class="text-center small-12 medium-8 medium-offset-2">
                <a href="{!! url('recover') !!}">Recover Password</a>
            </div>
        </div>
    </section>
@endsection
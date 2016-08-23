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
                        <div class="form-field block">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="mail@server.com">
                        </div>
                        <div class="form-field block">
                            <label>Password</label>
                            <input type="password" name="password">
                        </div>
                        <button type="submit">Login</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
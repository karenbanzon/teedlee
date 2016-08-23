@extends('master')
@section('content')
    <section class="row">
        <div class="small-12 medium-8 medium-offset-2">
            <hr>
            <h4 class="text-center">Create an account</h4>
            <hr>

            <div class="form-field block text-center">
                <a href="{!! url('oauth/facebook') !!}">
                    {!! Html::image('https://z-1-scontent.fmnl3-2.fna.fbcdn.net/t39.2178-6/851579_209602122530903_1060396115_n.png') !!}
                </a>
            </div>

            <div class="card small-12 medium-8 medium-offset-2">
                <div class="card-container padding-20">
                    <form>
                        {{--<div class="form-field block">--}}
                            {{--<label>Name</label>--}}
                            {{--<input type="text" placeholder="Juan Bayani">--}}
                        {{--</div>--}}
                        <div class="form-field block">
                            <label>Email</label>
                            <input type="email" placeholder="mail@server.com">
                        </div>
                        <div class="form-field block">
                            <label>Password</label>
                            <input type="password">
                        </div>
                        <div class="form-field block">
                            <label>Confirm Password</label>
                            <input type="password">
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
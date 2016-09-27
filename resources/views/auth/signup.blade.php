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
                    {!! Form::open(['url' => 'user/create']) !!}
                        <div class="form-field block">
                            <label>Desired Username</label>
                            <input type="text" name="username" value="{!! old('username') !!}" placeholder="Username" required class="form-control">
                        </div>
                        <div class="form-field block">
                            <label>Email</label>
                            <input type="email" name="email" value="{!! old('email') !!}" placeholder="mail@server.com" required class="form-control">
                        </div>

                        <div class="form-field block">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" required class="form-control">
                        </div>

                        <div class="form-field block">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="Re-type Password" required class="form-control">
                        </div>

                        <div class="form-field block small">
                            By submitting this form I agree with Teedlee's <a href="terms-of-use" target="_blank">Terms of Use</a>
                        </div>

                        <div class="form-field block">
                            <button type="submit" class="form-control">Submit</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="text-center small-12 medium-8 medium-offset-2">
                Already have an account?
                <br>
                <a href="{!! url('login') !!}">Login here.</a>
            </div>
        </div>
    </section>
@endsection
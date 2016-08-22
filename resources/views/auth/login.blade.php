@extends('master')
@section('content')
    <section class="row">
        <div class="small-12 medium-8 medium-offset-2">
            <hr>
            <h4 class="text-center">Login to your Teedlee account</h4>
            <hr>
            <div class="card small-12 medium-8 medium-offset-2">
                <div class="card-container padding-20">
                    <form>
                        <div class="form-field block">
                            <label>Email</label>
                            <input type="email" placeholder="mail@server.com">
                        </div>
                        <div class="form-field block">
                            <label>Password</label>
                            <input type="password">
                        </div>
                        <button type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
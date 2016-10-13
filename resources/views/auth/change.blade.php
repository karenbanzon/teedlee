@extends('master')

@section('title')
    Change Password
@endsection

@section('content')
    <section class="row">
        <div class="small-12 medium-8 medium-offset-2">
            <hr>
            <h4 class="text-center">Change Password</h4>
            <hr>

            <div class="card small-12 medium-8 medium-offset-2">
                <div class="card-container padding-20">
                    {!! Form::open(['url' => \Request::url() ]) !!}
                        <div class="form-field block">
                            <label>New Password</label>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>

                        <div class="form-field block">
                            <label>Re-Type Password</label>
                            <input type="password" name="password_confirmation" placeholder="Re-Type Password" required>
                        </div>

                        <button type="submit" class="pull-left">Recover</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('master')

@section('title')
    Password Recovery
@endsection

@section('content')
    <section class="row">
        <div class="small-12 medium-8 medium-offset-2">
            <hr>
            <h4 class="text-center">Password Recovery</h4>
            <hr>

            <div class="card small-12 medium-8 medium-offset-2">
                <div class="card-container padding-20">
                    {!! Form::open(['url' => 'recover']) !!}
                        <div class="form-field block">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="mail@server.com" required>
                        </div>
                        <button type="submit" class="pull-left">Recover</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('blank')

@section('title')
    Access Denied
@endsection

@section('content')
    <section class="row">
        <div class="small-12 large-8 large-offset-2 text-center">
            <hr>
            <h1>Hold up!</h1>
            <hr>
            <div class="small-10 small-offset-1">
                <img src="{!! url('images/403.png') !!}" alt="">
            </div>
            <p>You need admin access to see this page, sorry.</p>
            <a href="{!! url()->previous() !!}" class="button neutral">&larr; Go back</a>
        </div>
    </section>
@endsection
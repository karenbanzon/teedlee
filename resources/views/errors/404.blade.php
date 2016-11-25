@extends('blank')

@section('title')
    Page not found
@endsection

@section('content')
<div class="text-center">
    <hr>
    <h1>Whoa!</h1>
    <hr>
    <div class="small-10 small-offset-1">
        {!! Html::image('images/404.png') !!}
    </div>
    <p>We can't find the page you're looking for. Maybe go back and try again?</p>
    <a href="{!! url('login') !!}" class="button neutral">&larr; Log in</a>
</div>
@endsection
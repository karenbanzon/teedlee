@if( session('message') )
    <div class="alert alert-success hollow text-center">
        {{--<span class="alert-icon icon icon-check"></span>--}}
        <div class="message">{!! session('message') !!}</div>
    </div>
@endif

@if( session('error') )
    <div class="alert alert-error text-center">
        {{--<span class="alert-icon icon icon-stop"></span>--}}
        <div class="message">{!! session('error') !!}</div>
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-error text-center">
        @foreach ($errors->all() as $error)
            <div class="message">{!! $error !!}</div>
        @endforeach
    </div>
@endif
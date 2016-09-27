<!DOCTYPE html>
<html>
<head>
    <title>Teedlee</title>
    {!! Html::style('//fonts.googleapis.com/css?family=Montserrat|Open+Sans') !!}
    @yield('head')
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/app.min.css') !!}
</head>
<body>
    <div id="site-wrapper">
        <div id="site-canvas">
            @include('nav')
            @include('alerts')
            @if( \Route::is('home') )
                @include('home.slider')
            @endif
            <section class="row after-header">
                @yield('content')
            </section>
        </div>
        @include('footer')
    </div>

    {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
    {!! Html::script('js/ui.js') !!}
    @yield('scripts')
    {!! Html::script('js/script.js') !!}
</body>
</html>
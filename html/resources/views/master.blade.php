<!DOCTYPE html>
<html>
<head>
    <title>Teedlee</title>
    {!! Html::style('//fonts.googleapis.com/css?family=Montserrat|Open+Sans') !!}
    @yield('head')
</head>
<body>
    <div id="site-wrapper">
        <div id="site-canvas">
            @include('nav')
            @include('alerts')

            <section class="row">
                @yield('content')
            </section>

            <footer class="text-center padding-20">
                Copyright &copy; 2016, Teedlee Arts Inc.
            </footer>

            {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
            {!! Html::script('js/ui.js') !!}
            @yield('scripts')
            {!! Html::script('js/script.js') !!}
            {!! Html::style('css/style.css') !!}
            {!! Html::style('css/app.min.css') !!}
        </div>
    </div>
</body>
</html>
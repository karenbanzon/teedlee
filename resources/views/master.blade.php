<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Teedlee</title>
    {!! Html::style('//fonts.googleapis.com/css?family=Montserrat|Open+Sans') !!}
    {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
    @yield('head')
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/app.min.css') !!}
    <link rel="shortcut icon" href="{!! url('favicon.png') !!}" type="image/png" />
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-50518338-5', 'auto');
      ga('send', 'pageview');

    </script>
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

    {!! Html::script('js/ui.js') !!}
    @yield('scripts')
    {!! Html::script('js/script.js') !!}
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title', 'Teedlee')</title>
    {!! Html::style('//fonts.googleapis.com/css?family=Montserrat|Open+Sans') !!}
    {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
    @yield('head')
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/app.min.css') !!}
    <link rel="shortcut icon" href="{!! url('favicon.png') !!}" type="image/png" />
    @if( env('APP_ENV') == 'production' )
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '784713281655514');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=784713281655514&ev=PageView&noscript=1"
    /></noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-50518338-5', 'auto');
      ga('send', 'pageview');
    </script>
    @endif
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}
    {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('bower_components/AdminLTE/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('bower_components/AdminLTE/dist/css/skins/_all-skins.min.css') !!}
    <!--[if lt IE 9]>
    {!! Html::script('//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') !!}
    {!! Html::script('//oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}
    <![endif]-->
</head>
<body class="hold-transition">
    <div class="container">
        <section class="content">
            @yield('content')
        </section>
    </div>

    {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
    {!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
</body>
</html>
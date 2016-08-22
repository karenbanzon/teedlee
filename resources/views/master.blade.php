<!DOCTYPE html>
<html>
<head>
    <title>Teedlee</title>
    {!! Html::style('//fonts.googleapis.com/css?family=Lato:100') !!}
    {!! Html::style('app.css') !!}
    {!! Html::script('bower_components/jquery/dist/jquery.min.css') !!}
    {!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! @yield('head') !!}
</head>
<body>
    {!! @yield('content') !!}
</body>
</html>
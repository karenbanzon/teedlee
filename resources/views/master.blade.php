<!DOCTYPE html>
<html>
<head>
    <title>Teedlee</title>
    {!! Html::style('//fonts.googleapis.com/css?family=Montserrat|Open+Sans') !!}
    {!! Html::style('app.css') !!}
    {!! Html::script('bower_components/jquery/dist/jquery.min.css') !!}
    {!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('app.min.css') !!}
    {!! @yield('head') !!}
</head>
<body>
    <div id="site-wrapper">
        <div id="site-canvas">
            <div id="site-menu">
                <h4 class="padding-20">Menu</h4>
                <hr>
                <nav>
                    <a href="">Shop</a>
                    <a href="">Submit</a>
                    <a href="">Vote</a>
                </nav>
                <hr>
                <nav class="secondary">
                    <a href=""><span class="icon icon-shopping-cart"></span> Cart</a>
                    <a href=""><span class="icon icon-user"></span> My Account</a>
                    <a href=""><span class="icon icon-log-out"></span> Logout</a>
                </nav>
            </div>

            <header>
                <section class="row">
                    <nav class="header text-right ">
                        <a href="" class="brand"><img src="images/logo.png"></a>
                        <a href="" class="show-for-medium"><span class="icon icon-search"></span></a>
                        <a href="" class="show-for-medium">Shop</a>
                        <a href="" class="show-for-medium">Submit</a>
                        <a href="" class="show-for-medium">Vote</a>
                        <a href="" class="show-for-medium"><span class="icon icon-shopping-cart"></span></a>
                        <a href="" class="show-for-medium"><span class="icon icon-user"></span></a>
                        <a href="" class="toggle-nav show-for-small-only"><span class="icon icon-menu"></span></a>
                    </nav>
                </section>
            </header>

            <section class="row">
                @yield('content')
            </section>

            <footer class="text-center padding-20">
                Copyright &copy; 2016, Teedlee Arts Inc.
            </footer>

            {{--<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>--}}
            {!! Html::script('js/ui.js') !!}
        </div>
    </div>
</body>
</html>
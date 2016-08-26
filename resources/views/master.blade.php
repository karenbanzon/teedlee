<!DOCTYPE html>
<html>
<head>
    <title>Teedlee</title>
    {!! Html::style('//fonts.googleapis.com/css?family=Montserrat|Open+Sans') !!}
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/app.min.css') !!}
    @yield('head')
</head>
<body>
    <div id="site-wrapper">
        <div id="site-canvas">
            <div id="site-menu">
                <h4 class="padding-20">Menu</h4>
                <hr>
                <nav>
                    <a href="{!! url('shop') !!}">Shop</a>
                    <a href="{!! url('submit') !!}">Submit</a>
                    <a href="{!! url('vote') !!}">Vote</a>
                </nav>
                <hr>
                <nav class="secondary">
                    <a href="{!! url('cart') !!}"><span class="icon icon-shopping-cart"></span> Cart</a>
                    <a href="{!! url('user') !!}"><span class="icon icon-user"></span> My Account</a>
                    <a href="{!! url('logout') !!}"><span class="icon icon-log-out"></span> Logout</a>
                </nav>
            </div>

            <header>
                <section class="row">
                    <nav class="header text-right ">
                        <a href="{!! url('') !!}" class="brand"><img src="{!! url('images/logo.png') !!}"></a>
                        <a href="{!! url('search') !!}" class="show-for-medium"><span class="icon icon-search"></span></a>
                        <a href="{!! url('shop') !!}" class="show-for-medium">Shop</a>
                        <a href="{!! url('submit') !!}" class="show-for-medium">Submit</a>
                        <a href="{!! url('vote') !!}" class="show-for-medium">Vote</a>

                        @if( \Auth::check() )
                        <a href="{!! url('user') !!}" class="show-for-medium"><span class="icon icon-user"></span></a>
                        <a href="{!! url('') !!}" class="toggle-nav show-for-small-only"><span class="icon icon-menu"></span></a>
                        @else
                            <a href="{!! url('login') !!}" class="show-for-medium">Login</a>
                            <a href="{!! url('signup') !!}" class="show-for-medium">Sign up</a>
                        @endif

                        <a href="{!! url('cart') !!}" class="show-for-medium"><span class="icon icon-shopping-cart"></span></a>
                    </nav>
                </section>
            </header>

            @if( session('message') )
                <div class="alert alert-info text-center">{!! session('message') !!}</div>
            @endif

            @if( session('error') )
                <div class="alert alert-info text-center">{!! session('error') !!}</div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div class="text-center">{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <section class="row">
                @yield('content')
            </section>

            <footer class="text-center padding-20">
                Copyright &copy; 2016, Teedlee Arts Inc.
            </footer>

            {!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
            {!! Html::script('js/ui.js') !!}
            {!! Html::script('js/script.js') !!}
            @yield('scripts')
        </div>
    </div>
</body>
</html>
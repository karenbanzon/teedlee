<div id="site-menu">
    <h4 class="padding-20">Menu</h4>
    <hr>
    <nav>
        <a href="http://shop.teedlee.ph" rel="nofollow">Shop</a>
        <a href="{!! url('submit') !!}">Submit</a>
        <a href="{!! url('vote') !!}">Vote</a>
    </nav>
    <hr>
    <nav class="secondary">
        <a href="http://shop.teedlee.ph/search" class="show-for-large" rel="nofollow"><span class="icon icon-search"></span> Search</a>
        <a href="http://shop.teedlee.ph/cart" rel="nofollow"><span class="icon icon-shopping-cart"></span> Cart</a>
        @if( \Auth::check() )
            <a href="{!! url('user') !!}"><span class="icon icon-user"></span> My Account</a>
            <a href="{!! url('logout') !!}"><span class="icon icon-log-out"></span> Logout</a>
        @else
            <a href="{!! url('login') !!}"><span class="icon icon-user"></span> Login</a>
        @endif
    </nav>
</div>

<header id="main-header">
    <section class="row">
        <nav class="header text-right ">
            <a href="{!! url('') !!}" class="brand"><img src="{!! url('images/logo.png') !!}"></a>
            <a href="http://shop.teedlee.ph" class="show-for-large" rel="nofollow">Shop</a>
            <a href="{!! url('submit') !!}" class="show-for-large">Submit</a>
            <a href="{!! url('vote') !!}" class="show-for-large">Vote</a>

            @if( \Auth::check() )
                <div class="dropdown">
                    <a href="#" class="show-for-large dropdown-toggle"><span class="icon icon-user"></span></a>
                    <ul class="dropdown-menu right">
                        <li><a href="{!! url('user') !!}">My Profile</a></li>
                        <li><a href="{!! url('logout') !!}">Logout</a></li>
                    </ul>
                </div>
                {{--<a href="{!! url('') !!}" class="toggle-nav show-for-small-only"><span class="icon icon-menu"></span></a>--}}
            @else
                <a href="{!! url('login') !!}" class="show-for-large">Login</a>
            @endif

            <a href="http://shop.teedlee.ph/search" class="show-for-large" rel="nofollow"><span class="icon icon-search"></span></a>
            <a href="http://shop.teedlee.ph/cart" class="show-for-large" rel="nofollow"><span class="icon icon-shopping-cart"></span></a>
            <a href="" class="toggle-nav hide-for-large"><span class="icon icon-menu"></span></a>
        </nav>
    </section>
</header>
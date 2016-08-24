<div class="card small-2 show-for-medium">
    <nav class="account-nav">
        <a href="{!! url('user') !!}" class="{!! Route::getCurrentRoute()->getPath() == 'user' ? 'active' : null !!}">Profile</a>
        <a href="{!! url('user/submissions') !!}" class="{!! Route::getCurrentRoute()->getPath() == 'user/submissions' ? 'active' : null !!}">Submissions</a>
        <a href="{!! url('user/sales') !!}" class="{!! Route::getCurrentRoute()->getPath() == 'user/sales' ? 'active' : null !!}">Sales</a>
        <a href="{!! url('logout') !!}">Logout</a>
    </nav>
</div>
<div class="card small-12 show-for-small-only">
    <nav class="account-nav-small">
        <a href="{!! url('user') !!}" class="{!! Route::getCurrentRoute()->getPath() == 'user' ? 'active' : null !!}">Profile</a>
        <a href="{!! url('user/submissions') !!}" class="{!! Route::getCurrentRoute()->getPath() == 'user/submissions' ? 'active' : null !!}">Submissions</a>
        <a href="{!! url('user/sales') !!}" class="{!! Route::getCurrentRoute()->getPath() == 'user/sales' ? 'active' : null !!}">Sales</a>
        <a href="{!! url('logout') !!}">Logout</a>
    </nav>
</div>

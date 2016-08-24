@extends('master')
@section('content')
    <section class="row">
        <div class="small-12 medium-8 medium-offset-2">
            <hr>
            <h4 class="text-center">My Account</h4>
            <hr>
        </div>
        <div class="small-12">
            <div class="card small-2 show-for-medium">
                <nav class="account-nav">
                    <a href="{!! url('user') !!}" class="active">Profile</a>
                    <a href="{!! url('user/submissions') !!}">Submissions</a>
                    <a href="{!! url('user/sales') !!}">Sales</a>
                    <a href="{!! url('user/logout') !!}">Logout</a>
                </nav>
            </div>
            <div class="card small-12 show-for-small-only">
                <nav class="account-nav-small">
                    <a href="" class="active">Profile</a>
                    <a href="">Submissions</a>
                    <a href="">Sales</a>
                </nav>
            </div>
            <div class="card small-12 medium-10 padding-20">
                <div class="profile-detail">
                    <h6 class="label">Photo</h6>
                    <div class="profile-entry photo">
                        <img src="http://placehold.it/150x150">
                        <button class="small white">Upload new</button>
                    </div>
                </div>
                <div class="profile-detail">
                    <h6 class="label">Alias</h6>
                    <div class="profile-entry alias">
                        <span class="profile-entry-data">Juan Jose</span>
                        <a class="profile-action" href=""><span class="icon icon-pencil"></span></a>
                    </div>
                </div>
                <div class="profile-detail">
                    <h6 class="label">Alias</h6>
                    <div class="profile-entry editing">
                        <input type="text" placeholder="Alias" value="Juan Jose">
                        <button class="small white">Save</button>
                    </div>
                </div>
                <div class="profile-detail">
                    <h6 class="label">Username</h6>
                    <div class="profile-entry alias">
                        <span class="profile-entry-data">juanjose</span>
                        <a class="profile-action" href=""><span class="icon icon-pencil"></span></a>
                    </div>
                </div>
                <div class="profile-detail">
                    <h6 class="label">Username</h6>
                    <div class="profile-entry editing">
                        <input type="text" placeholder="Username" value="juanjose">
                        <button class="small white">Save</button>
                    </div>
                </div>
                <div class="profile-detail">
                    <h6 class="label">Website</h6>
                    <div class="profile-entry website">
                        <span class="profile-entry-data unfilled">http://www.</span>
                        <a class="profile-action" href=""><span class="icon icon-pencil"></span></a>
                    </div>
                </div>
                <div class="profile-detail">
                    <h6 class="label">Website</h6>
                    <div class="profile-entry editing">
                        <input type="text" placeholder="Website" value="http://www.juanjose.com">
                        <button class="small white">Save</button>
                    </div>
                </div>
                <div class="profile-detail">
                    <h6 class="label">About Me</h6>
                    <div class="profile-entry website">
                        <span class="profile-entry-data">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span>
                        <a class="profile-action" href=""><span class="icon icon-pencil"></span></a>
                    </div>
                </div>
                <div class="profile-detail">
                    <h6 class="label">About Me</h6>
                    <div class="profile-entry editing">
                        <small>300 characters left</small>
                        <textarea rows="5" placeholder="About me">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</textarea>
                        <button class="small white">Save</button>
                    </div>
                </div>
                <div class="profile-detail">
                    <h6 class="label">Profile URL</h6>
                    <div class="profile-entry website">
                        <span class="profile-entry-data"><a href="">http://teedlee.ph/artist/juanjose</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
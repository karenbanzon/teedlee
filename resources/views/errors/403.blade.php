@extends('blank')

@section('title')
    Access Denied
@endsection

@section('content')
<div class="text-center">
    <h2 class="text-red">403 - Access Denied</h2>
    <p class="text-center">
        <h3><i class="fa fa-danger text-red"></i>You do not have access to this resource.</h3>
    </p>
    <p>&nbsp;</p>
    <p>
        <a href="{!! secure_url('login?redirect=admin') !!}" class="btn btn-primary btn-lg">Login as Admin</a>
    </p>
</div>
@endsection
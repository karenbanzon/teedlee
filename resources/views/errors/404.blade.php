@extends('blank')

@section('title')
    Page not found
@endsection

@section('content')
<div class="text-center">
    <h2 class="text-red">404 - Page not found</h2>
    <p class="text-center">
        <h3><i class="fa fa-danger text-red"></i>The page you are trying to access does nto exist.</h3>
    </p>
    <p>&nbsp;</p>
    <p>
        <a href="{!! url('') !!}" class="btn btn-primary btn-lg">Got to Homepage</a>
    </p>
</div>
@endsection
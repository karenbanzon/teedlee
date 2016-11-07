<?php

Route::group(['middleware' => ['auth', 'https']], function() {
    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'UserController@index');
    Route::get('user/profile', 'UserController@profile');
    Route::post('user/update', 'UserController@update');
    Route::get('user/submissions', 'UserController@submissions');
    Route::post('user/submissions/{submission}/artwork', 'UserController@artwork');
    Route::get('user/sales', 'UserController@sales');
    Route::resource('submissions', 'SubmissionController');
    Route::get('submit/form', 'SubmissionController@create');
    Route::resource('submission-image', 'SubmissionImageController');
    Route::get('vote/done', 'VoteController@done');
    Route::resource('vote', 'VoteController');

    Route::get('orders/all', 'OrderController@all');
    Route::resource('orders', 'OrderController');
    Route::get('user/orders/{username}', 'OrderController@vendor');
    Route::get('products', 'SubmissionController@products');
});

Route::group(['middleware' => ['admin', 'https']], function() {
    Route::get('admin', 'Admin\IndexController@index');
    Route::get('admin/submissions', 'Admin\SubmissionController@index');
    Route::get('admin/submissions/{submission_status}', 'Admin\SubmissionController@byStatus');
    Route::post('admin/submission/{submission}/shopify-link', 'Admin\SubmissionController@shopify_link');
    Route::resource('admin/submission', 'Admin\SubmissionController');
    Route::any('admin/submission/promote/{submission}/{status}', 'Admin\SubmissionController@promote');
    Route::any('admin/submission/expire/{submission}/{type}', 'Admin\SubmissionController@expire');
    Route::resource('admin/user', 'Admin\UserController');
    Route::get('shop/test', 'ShopController@test');
});


Route::group(['middleware' => ['https']], function() {
    Route::post('auth', 'AuthController@index');
    Route::get('login', 'AuthController@login');
    Route::get('signup', 'AuthController@signup');
    Route::any('recover', 'AuthController@recover');
    Route::any('recover/{user}/{hash}', 'AuthController@change');
    Route::get('oauth/{service}', 'AuthController@oauth');
    Route::get('oauth/callback/{service}', 'AuthController@oauthCallback');
    Route::post('user/create', 'UserController@create');
    Route::get('user/welcome', 'UserController@welcome');
    Route::get('user/activate/{user}/{token}', 'UserController@activate');
    Route::get('submit', 'SubmissionController@index');
    Route::get('vote', 'VoteController@index');
    Route::get('vote/{submission}/{referrer}', 'VoteController@create');

    Route::get('orders/all', 'OrderController@all');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('expire', 'UtilsController@searchAndExpire');
    Route::get('{username}', 'UserController@show');
});
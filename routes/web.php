<?php

Route::group(['middleware' => ['https']], function() {
    Route::post('auth', 'AuthController@index');
    Route::get('login', 'AuthController@login');
    Route::get('signup', 'AuthController@signup');
    Route::get('oauth/{service}', 'AuthController@oauth');
    Route::get('oauth/callback/{service}', 'AuthController@oauthCallback');
    Route::post('user/create', 'UserController@create');
    Route::get('user/welcome', 'UserController@welcome');
    Route::get('user/activate/{user}/{token}', 'UserController@activate');
});

Route::group(['middleware' => ['auth', 'https']], function() {
    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'UserController@index');
    Route::get('user/profile', 'UserController@profile');
    Route::post('user/update', 'UserController@update');
    Route::get('user/submissions', 'UserController@submissions');
    Route::post('user/submissions/{submission}/artwork', 'UserController@artwork');
    Route::get('user/sales', 'UserController@sales');
    Route::resource('submissions', 'SubmissionController');
    Route::get('submit', 'SubmissionController@create');
    Route::resource('submission-image', 'SubmissionImageController');
    Route::get('vote/{submission}', 'VoteController@index');
    Route::resource('vote', 'VoteController');
});

Route::group(['middleware' => ['admin', 'https']], function() {
    Route::get('admin', 'Admin\IndexController@index');
    Route::get('admin/submissions', 'Admin\SubmissionController@index');
    Route::get('admin/submissions/{submission_status}', 'Admin\SubmissionController@byStatus');
    Route::post('admin/submission/{submission}/shopify-link', 'Admin\SubmissionController@shopify_link');
    Route::resource('admin/submission', 'Admin\SubmissionController');
    Route::any('admin/submission/promote/{submission}/{status}', 'Admin\SubmissionController@promote');
    Route::resource('admin/user', 'Admin\UserController');
});

Route::group(['middleware' => ['http']], function() {
    Route::get('/', 'HomeController@index')->name('home');
//    Route::get('shop/', 'ShopController@index');
    Route::get('expire', 'UtilsController@searchAndExpire');
    Route::get('votes', 'VoteController@landing');
    Route::get('votes/done', 'VoteController@done');
    Route::get('{username}', 'UserController@show');
});
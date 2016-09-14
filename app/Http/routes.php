<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['http']], function() {
    Route::get('/', 'HomeController@index');
    Route::get('shop/', 'ShopController@index');
});

Route::group(['middleware' => ['https']], function() {
    Route::post('auth', 'AuthController@index');
    Route::get('login', 'AuthController@login');
    Route::get('signup', 'AuthController@signup');
    Route::get('oauth/{service}', 'AuthController@oauth');
    Route::get('oauth/callback/{service}', 'AuthController@oauthCallback');
    Route::post('user/create', 'UserController@create');
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
    Route::resource('vote', 'VoteController');
});

Route::group(['middleware' => ['admin', 'https']], function() {
    Route::get('admin', 'AdminController@index');
});

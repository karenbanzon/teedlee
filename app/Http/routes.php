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

Route::get('/', 'HomeController@index');
Route::post('auth', 'AuthController@index');
Route::get('login', 'AuthController@login');
Route::get('signup', 'AuthController@signup');
Route::get('oauth/{service}', 'AuthController@oauth');
Route::get('oauth/callback/{service}', 'AuthController@oauthCallback');
Route::get('logout', 'AuthController@logout');
Route::get('user', 'UserController@index');
Route::post('user/create', 'UserController@create');
Route::get('user/activate/{user}/{token}', 'UserController@activate');
Route::get('user/profile', 'UserController@profile');
Route::get('user/submissions', 'UserController@submissions');
Route::get('user/sales', 'UserController@sales');
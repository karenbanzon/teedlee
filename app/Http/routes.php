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

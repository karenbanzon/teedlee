<?php

Route::get('ad/contest/{contest}', 'ContestController@ad');

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
    Route::resource('admin/contest', 'Admin\ContestController');
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
    Route::get('vote/create', 'VoteController@create');
    Route::get('vote/done', 'VoteController@done');

    Route::get('vote/contest/{contest}', 'VoteController@contest');
    Route::get('vote/contest/{contest}/{referer?}', 'VoteController@contest');
    Route::get('vote/{submission}/{referrer}', 'VoteController@create');

//    Shopify doesn't support standard HTTP verbs. Use manual routing.
    Route::any('shopify/order/create', 'ShopifyController@create');
    Route::any('shopify/order/update', 'ShopifyController@update');

//    Route::get('orders/all', 'OrderController@index');
//    Route::any('order/store', 'OrderController@store');
//    Route::any('order/update', 'OrderController@update');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('expire', 'UtilsController@searchAndExpire');
    Route::get('update', 'UtilsController@searchAndUpdate');
});

Route::group(['middleware' => ['auth', 'https']], function() {
    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'UserController@index');
    Route::get('user/profile', 'UserController@profile');
    Route::post('user/update', 'UserController@update');
    Route::get('user/submissions', 'UserController@submissions');
    Route::post('user/submissions/{submission}/artwork', 'UserController@artwork');
    Route::get('user/submissions', 'UserController@submissions');

    Route::get('user/entries', 'UserController@entries');
    Route::get('user/sales', 'UserController@sales');

    Route::resource('submissions', 'SubmissionController');
    Route::get('submit/form', 'SubmissionController@create');
    Route::resource('submission-image', 'SubmissionImageController');

    Route::get('entries/submit/{contest}', 'EntryController@submit');
    Route::resource('entries', 'EntryController');
    Route::resource('entry-image', 'EntryImageController');

    Route::get('user/orders/{username}', 'OrderController@vendor');
    Route::get('orders/product/{submission}', 'OrderController@submission');
    Route::resource('orders', 'OrderController');

    Route::get('products', 'SubmissionController@products');

    Route::resource('contest', 'ContestController', ['except' => ['show']]);
    Route::resource('admin/entries', 'Admin\EntryController');

    Route::resource('vote', 'VoteController', ['except' => ['index']]);
});


// Fallback route
Route::group(['middleware' => ['https']], function() {
    Route::get('{username}', 'UserController@show');
    Route::get('contest/{contest}', 'ContestController@show');
});
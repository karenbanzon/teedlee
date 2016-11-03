<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => Teedlee\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],


    'facebook' => [
        'client_id' => '260663264328654', //'173048843120426',
        'client_secret' => '559e06bd6ae6cb48a9dd2de3295fcc19', //'c28f658ff2fca09d79b8c1712eb60021',
        'redirect' => 'https://'.$_SERVER['SERVER_NAME'].'/oauth/callback/facebook',
    ],

    'shopify' => [
        'api_key' => '398a08ae2084aab40715f5750867dced',
        'api_secret' => '33a14b2f93fb497f593e308d9db71d97',
        'api_password' => '6a462d574c77ef17de9c7c0b5a147ee3',
        'token' => '',
        'domain' => 'teedlee.myshopify.com',
        'redirect' => 'https://'.$_SERVER['SERVER_NAME'].'/shop/callback/shopify',
    ],

];

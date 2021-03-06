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
    
    'sendinblue' => [
       'url' => 'https://api.sendinblue.com/v2.0',
       'key' => env('SENDINBLUE_KEY'),
    ],    
];

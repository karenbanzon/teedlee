<?php

namespace Teedlee\Providers;

use Illuminate\Support\ServiceProvider;
use Teedlee\User;

class AuthWrapperProvider extends \Illuminate\Support\Facades\Auth
{
    public static function attempt($credentials)
    {
        $field = strpos($credentials['email'], '@') === false ? 'username' : 'email';
        $user = User::where($field, $credentials['email'])->first();

        if( $user && \Hash::check($credentials['password'], $user->password) && $user->status=='active' )
        {
            AuthWrapperProvider::login($user, true);
            return true;
        } else {
            AuthWrapperProvider::logout();
            return false;
        }
    }
}

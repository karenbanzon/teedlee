<?php

namespace Teedlee\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Teedlee\User;

class SocialAccount extends Model
{
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    public function user()
    {
        return $this->belongsTo(\User::class);
    }

    public function createOrGetUser(ProviderUser $providerUser, $service_name)
    {
        $account = SocialAccount::whereProvider($service_name)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $service_name
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'firstname' => method_exists($providerUser, 'getFirstName') ? $providerUser->getFirstName() : null,
                    'lastname' => method_exists($providerUser, 'getLastName') ? $providerUser->getLastName() : null,
//                    'gender' => $providerUser->getGender()
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }
    }
}
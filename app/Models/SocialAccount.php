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
        return $this->belongsTo(User::class);
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
                    'username' => 'user'.time(),
                    'firstname' => method_exists($providerUser, 'getFirstName') ? $providerUser->getFirstName() : " ",
                    'lastname' => method_exists($providerUser, 'getLastName') ? $providerUser->getLastName() : " ",
//                    'gender' => $providerUser->getGender()
                    'user_group_id' => 5,
                    'city_id' => 1,
                    'province_id' => 1,
                    'status' => 'active',
                ]);
                mkdir(public_path('users'.DIRECTORY_SEPARATOR.$user->id), 0775, true);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
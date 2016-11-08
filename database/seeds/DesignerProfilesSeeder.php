<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DesignerProfilesSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->users();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function users()
    {
        $vendors = [
            'allenbangis',
            'Chaks',
            'derrickcmacutay',
            'gnob',
            'jasonm',
            'Juju Bear',
            'Lawrence del Mundo',
            'niledward3',
            'ranja',
            'Vitamin D'
        ];

        $data = [];

        foreach ($vendors as $vendor)
        {
            $data[] =
                [
                    'user_group_id' => 6,
                    'email' => l($vendor).'@teedlee.ph',
                    'username' => $vendor,
                    'password' => \Hash::make('12345678'),
                    'firstname' => $vendor,
                    'lastname' => $vendor,
                    'phone' => '',
                    'mobile' => '',
                    'gender' => 'male',
                    'address' => '',
                    'address2' => '',
                    'city_id' => 1,
                    'province_id' => 1,
                    'about_me' => '',
                    'avatar' => 'http://www.24city.org/images/no-photo.jpg',
                    'website' => '',
                    'status' => 'active',
                    'is_premium' => 0,
                    'is_profile_complete' => true,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => null,
                    'remember_token' => ''
            ];
        }

//        dd(json_encode($data));

        DB::table('users')->insert($data);

        return $this;
    }
}
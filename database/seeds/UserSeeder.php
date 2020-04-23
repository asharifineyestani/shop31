<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        User::create([
            'name' => 'Admin',
            'email' => 'admin@afracode.com',
            'password' => bcrypt('password'),
            'city_id' => 1,
            'mobile' => '09120000001',
        ])->assignRole('admin');

        User::create([
            'name' => 'Seller',
            'email' => 'seller@afracode.com',
            'password' => bcrypt('password'),
            'city_id' => 1,
            'mobile' => '09120000002',
        ])->assignRole('seller');


        User::create([
            'name' => 'User',
            'email' => 'user@afracode.com',
            'password' => bcrypt('password'),
            'city_id' => 1,
            'mobile' => '09120000003',

        ]);
    }
}

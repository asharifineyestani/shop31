<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {


//        \Spatie\Permission\Models\Role::create([
//            'name' => 'super-admin',
//            'guard_name' => 'web',
//        ]);
//
//
//        \Spatie\Permission\Models\Role::create([
//            'name' => 'admin',
//            'guard_name' => 'web',
//        ]);
//
//        \Spatie\Permission\Models\Role::create([
//            'name' => 'seller',
//            'guard_name' => 'web',
//        ]);
//
//
//        \Spatie\Permission\Models\Role::create([
//            'name' => 'user',
//            'guard_name' => 'web',
//        ]);



        \App\User::find(1)->assignRole('super-admin');

    }
}

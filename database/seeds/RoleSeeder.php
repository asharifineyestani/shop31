<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('manage_users');
        Role::create(['name' => 'seller']);
    }
}

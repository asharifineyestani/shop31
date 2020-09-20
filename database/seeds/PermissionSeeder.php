<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'users-read']);
        Permission::create(['name' => 'users-insert']);
        Permission::create(['name' => 'users-update']);
        Permission::create(['name' => 'users-delete']);

        Permission::create(['name' => 'sellers-read']);
        Permission::create(['name' => 'sellers-insert']);
        Permission::create(['name' => 'sellers-update']);
        Permission::create(['name' => 'sellers-delete']);

        Permission::create(['name' => 'pages-read']);
        Permission::create(['name' => 'pages-insert']);
        Permission::create(['name' => 'pages-update']);
        Permission::create(['name' => 'pages-delete']);


        Permission::create(['name' => 'posts-read']);
        Permission::create(['name' => 'posts-insert']);
        Permission::create(['name' => 'posts-update']);
        Permission::create(['name' => 'posts-delete']);


        Permission::create(['name' => 'products-read']);
        Permission::create(['name' => 'products-insert']);
        Permission::create(['name' => 'products-update']);
        Permission::create(['name' => 'products-delete']);

        Permission::create(['name' => 'categories-read']);
        Permission::create(['name' => 'categories-insert']);
        Permission::create(['name' => 'categories-update']);
        Permission::create(['name' => 'categories-delete']);
    }
}

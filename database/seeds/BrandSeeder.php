<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run()
    {

        $records = [
            [
                'title' => 'Apple',
                'avatar_path' => '/uploads/media/Apple.jpg',
            ],
            [
                'title' => 'Google',
                'avatar_path' => '/uploads/media/Google.jpg',
            ],
            [
                'title' => 'Microsoft',
                'avatar_path' => '/uploads/media/Microsoft.jpg',
            ],
            [
                'title' => 'Coca-Cola',
                'avatar_path' => '/uploads/media/Coca-Cola.jpg',
            ],
            [
                'title' => 'Samsung',
                'avatar_path' => '/uploads/media/Samsung.jpg',
            ],
            [
                'title' => 'Disney',
                'avatar_path' => '/uploads/media/Disney.jpg',
            ],
            [
                'title' => 'Toyota',
                'avatar_path' => '/uploads/media/Toyota.jpg',
            ],
            [
                'title' => "McDonald's",
                'avatar_path' => "/uploads/media/McDonald.jpg",
            ],
            [
                'title' => 'Intel',
                'avatar_path' => '/uploads/media/Intel.jpg',
            ],
        ];

        foreach ($records as $record)
            Brand::create($record);
    }
}

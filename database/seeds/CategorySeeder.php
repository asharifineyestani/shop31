<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $records = [
            [
                'title' => 'Baby'
            ],
            [
                'title' => 'Beauty'
            ],
            [
                'title' => 'Books'
            ],
            [
                'title' => 'Camera'
            ],
            [
                'title' => 'Clothing & Accessories'
            ],
            [
                'title' => 'Software'
            ],
            [
                'title' => 'Sports'
            ],
            [
                'title' => 'Video Games'
            ],
            [
                'title' => 'Phone'
            ]
        ];

        foreach ($records as $record)
            Category::create($record);
    }
}

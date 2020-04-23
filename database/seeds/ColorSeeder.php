<?php

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    public function run()
    {
        //

        $records = [
            [
                'name' => 'Black'
            ],
            [
                'name' => 'White'
            ],
            [
                'name' => 'Silver'
            ],
            [
                'name' => 'Gold'
            ],
            [
                'name' => 'Pink'
            ]
        ];

        foreach ($records as $record)
            Color::create($record);

    }
}

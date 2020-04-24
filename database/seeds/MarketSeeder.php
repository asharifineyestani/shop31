<?php

use Illuminate\Database\Seeder;
use \App\Models\Market;

class MarketSeeder extends Seeder
{

    public function run()
    {
        $markets = [
            [
                'product_id' => 1,
                'shop_id' => 1,
                'color_id' => 1,
                'price' => 1000,
                'quantity' => 10,
            ],
            [
                'product_id' => 1,
                'shop_id' => 1,
                'color_id' => 2,
                'price' => 1500,
                'quantity' => 8,
            ],
            [
                'product_id' => 1,
                'shop_id' => 1,
                'color_id' => 3,
                'price' => 900,
                'quantity' => 6,
            ],
            [
                'product_id' => 1,
                'shop_id' => 2,
                'color_id' => 1,
                'price' => 1500,
                'quantity' => 10,
            ],
            [
                'product_id' => 1,
                'shop_id' => 2,
                'color_id' => 2,
                'price' => 1500,
                'quantity' => 8,
            ],
            [
                'product_id' => 1,
                'shop_id' => 2,
                'color_id' => 3,
                'price' => 1500,
                'quantity' => 6,
                'discount_percent' => 10
            ],
            [
                'product_id' => 2,
                'shop_id' => 1,
                'color_id' => 2,
                'price' => 1500,
                'quantity' => 8,
                'quantity' => 5,
            ],
            [
                'product_id' => 2,
                'shop_id' => 1,
                'color_id' => 3,
                'price' => 900,
                'quantity' => 6,
            ],
            [
                'product_id' => 2,
                'shop_id' => 2,
                'color_id' => 1,
                'price' => 2000,
                'quantity' => 10,
            ],

        ];

        foreach ($markets as $market)
            Market::create($market);
    }
}

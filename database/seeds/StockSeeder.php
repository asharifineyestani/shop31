<?php

use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{


    public function run()
    {
        $stocks = [
            [
                'product_id' => 1,
                'shop_id' => 1,
                'color_id' => 1,
                'price' => 1000,
                'quantity' => 10,
                'discount_percent' => 25
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
                'discount_percent' => 5,
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

        foreach ($stocks as $stock)
            \App\Models\Stock::create($stock);
    }
}

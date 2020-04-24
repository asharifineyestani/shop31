<?php

use Illuminate\Database\Seeder;
use App\Models\Shop;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = [
            [
                'city_id' => 1,
                'user_id' => 1,
                'title' => "Shop 01",
                'avatar_path' => '/uploads/media/shop1.jpg',
            ],
            [
                'city_id' => 1,
                'user_id' => 2,
                'title' => "Shop 02",
                'avatar_path' => '/uploads/media/shop2.jpg',
            ],

        ];

        foreach ($shops as $shop)
            Shop::create($shop);
    }
}

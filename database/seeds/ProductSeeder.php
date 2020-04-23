<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Product::create([
            'category_id' => 1,
            'brand_id' => 1,
            'title' => 'iPhone 11 Pro Max A2220',
            'details' => [
                '1' => 1,
                '2' => 5,
                '3' => 7,
                '4' => "More Description",
                '5' => ["hands-free","beautiful box"],
                '6' => [12,11],
                '7' => 0,
            ],

        ]);

    }
}

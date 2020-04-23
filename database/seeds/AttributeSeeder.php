<?php

use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $option = null;

        $options = [
            ['title' => 'android'],
            ['title' => 'iOS'],
            ['title' => 'Windows Phone']
        ];
        foreach ($options as $opt) {
            $option[] = new \App\Models\Option($opt);
        }

        Attribute::create([
            'category_id' => 1,
            'title' => 'OS',
            'is_filter' => 1,
            'type' => 'SELECT',
        ])->options()->saveMany($option);

        Attribute::create([
            'category_id' => 1,
            'title' => 'resolution',
            'is_filter' => 1,
            'type' => 'SELECT',
        ]);


        $option = null;

        $options = [
            ['title' => '13mp'],
            ['title' => '15mp'],
            ['title' => '8mp'],
        ];
        foreach ($options as $opt) {
            $option[] = new \App\Models\Option($opt);
        }

        Attribute::create([
            'category_id' => 1,
            'title' => 'camera',
            'is_filter' => 0,
            'type' => 'BOOLEAN',
        ])->options()->saveMany($option);

        Attribute::create([
            'category_id' => 1,
            'title' => 'more description',
            'is_filter' => 0,
            'type' => 'STRING',
        ]);

        Attribute::create([
            'category_id' => 1,
            'title' => 'other features',
            'is_filter' => 0,
            'type' => 'ARRAY',
        ]);



        $option = null;

        $options = [
            ['title' => '3G'],
            ['title' => '4G'],
            ['title' => '4.5G'],
            ['title' => '5G'],
        ];
        foreach ($options as $opt) {
            $option[] = new \App\Models\Option($opt);
        }

        Attribute::create([
            'category_id' => 1,
            'title' => 'communication networks',
            'is_filter' => 0,
            'type' => 'MULTI_SELECT',
        ])->options()->saveMany($option);

        Attribute::create([
            'category_id' => 1,
            'title' => 'radio',
            'is_filter' => 0,
            'type' => 'BOOLEAN',
        ]);
    }

}

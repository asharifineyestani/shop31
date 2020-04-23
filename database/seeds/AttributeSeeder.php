<?php

use Illuminate\Database\Seeder;
use App\Models\Attribute;
use \App\Models\Option;

class AttributeSeeder extends Seeder
{

    public function run()
    {

        $attributes = [
            [
                'category_id' => 1,
                'title' => 'OS',
                'is_filter' => 1,
                'type' => 'RADIO',
                'options' =>
                    [
                        ['title' => 'android'],
                        ['title' => 'iOS'],
                        ['title' => 'Windows Phone']
                    ]
            ],
            [
                'category_id' => 1,
                'title' => 'RAM',
                'is_filter' => 1,
                'type' => 'RADIO',
                'options' =>
                    [
                        ['title' => '2GB'],
                        ['title' => '4GB'],
                        ['title' => '6GB']
                    ]
            ],
            [
                'category_id' => 1,
                'title' => 'camera',
                'is_filter' => 0,
                'type' => 'RADIO',
                'options' =>
                    [
                        ['title' => '13mp'],
                        ['title' => '15mp'],
                        ['title' => '8mp'],
                    ]
            ],
            [
                'category_id' => 1,
                'title' => 'more description',
                'is_filter' => 0,
                'type' => 'STRING',
                'options' => null
            ],
            [
                'category_id' => 1,
                'title' => 'other features',
                'is_filter' => 0,
                'type' => 'ARRAY',
                'options' => null
            ],
            [
                'category_id' => 1,
                'title' => 'communication networks',
                'is_filter' => 0,
                'type' => 'CHECKBOX',
                'options' => [
                    ['title' => '3G'],
                    ['title' => '4G'],
                    ['title' => '4.5G'],
                    ['title' => '5G'],
                ]
            ],
            [
                'category_id' => 1,
                'title' => 'other features',
                'is_filter' => 0,
                'type' => 'ARRAY',
                'options' => null
            ],
        ];

        foreach ($attributes as $attribute) {

            $option = null;

            $clone = $attribute;
            unset($clone['options']);

            $new = Attribute::create($clone);

            if (is_array($attribute['options'])) {
                foreach ($attribute['options'] as $opt) {
                    $option[] = new Option($opt);
                }
                $new->options()->saveMany($option);
            }


        }

    }

}

<?php

namespace App\Http\Resources\Shop;

use App\Models\Attribute;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request)
    {



        return [

            "id" => $this->id,
            "title" => $this->title,
            "category_id" => $this->category_id,
            "brand_id" => $this->brand_id,
            "details" => $this->details,
            "details_view" => $this->getDetails($this->details),

        ];
    }


    private function getDetails($value)
    {
        $details = [];


        $attributes = $value;


        foreach ($attributes as $key => $value) {

            $attribute = Attribute::find($key);

            if (!$attribute)
                continue;


            $details[] = [
                'value' => $this->getDetailValue($value, $attribute->type),
                'attribute_id' => $attribute->id,
                'type' => $attribute->type,
                'title' => $attribute->title,
            ];


        }


        return $details;
    }


    private function getDetailValue($value, $type)
    {

        if (is_array($value) && $type == 'multiple-select')
            $value = implode(',', $value);


        return $value;

    }


}

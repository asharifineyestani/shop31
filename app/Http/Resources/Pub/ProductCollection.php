<?php

namespace App\Http\Resources\Pub;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{


    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "details" => $this->details,
            "in_stock" => $this->in_stock,
        ];
    }
}

<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Pub\FilterCollection;
use App\Http\Resources\Pub\ProductCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
{


    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "type" => $this->type,
            "is_filter" => $this->is_filter,
            "options" => OptionCollection::collection($this->whenLoaded('options')),
            "category" => OptionCollection::collection($this->whenLoaded('category')),
        ];
    }
}

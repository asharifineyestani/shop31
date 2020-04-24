<?php

namespace App\Http\Resources\Pub;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "slug" => $this->slug,
            "filters" => FilterCollection::collection($this->whenLoaded('filters')),
            "products" => ProductCollection::collection($this->whenLoaded('products')),
        ];
    }
}

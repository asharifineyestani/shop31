<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "avatar_path" => $this->type,
            "details" => $this->details,
            "in_stock" => $this->in_stock,
            "brand" => new BrandResource($this->whenLoaded('brand')),
            "category" => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}

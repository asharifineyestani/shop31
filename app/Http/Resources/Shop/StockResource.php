<?php

namespace App\Http\Resources\Shop;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
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
            "price" => $this->price,
            "quantity" => $this->quantity,
            "color" => new ColorResource($this->whenLoaded('color')),
            "product" => new ProductResource($this->whenLoaded('product')),
            "shop" => new ShopResource($this->whenLoaded('shop')),
        ];
    }
}

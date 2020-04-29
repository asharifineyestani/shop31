<?php

namespace App\Http\Resources\Shop;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
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
            "avatar_path" => $this->avatar_path,
            "shipping_policy" => $this->shipping_policy,
            "return_policy" => $this->return_policy,
            "city" => new CityResource($this->whenLoaded('city')),
            "user" => new UserResource($this->whenLoaded('user')),
        ];
    }
}

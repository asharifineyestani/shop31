<?php

namespace App\Http\Resources\Pub;

use Illuminate\Http\Resources\Json\JsonResource;

class FilterCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "type" => $this->type,
            "options" => $this->options(),
        ];
    }


    public function options()
    {
        $options = OptionCollection::collection($this->whenLoaded('options'));

        return ($options);
    }
}

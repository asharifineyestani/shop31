<?php

namespace App\Casts;

use App\Models\Option;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use \App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;

class Json implements CastsAttributes
{

    public $attribute;
    public $option;

    public function get($model, $key, $value, $attributes)
    {
        return json_decode($value);
    }





    public function set($model, $key, $value, $attributes)
    {
        return (json_encode($value));
    }
}

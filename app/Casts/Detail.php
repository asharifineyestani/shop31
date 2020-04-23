<?php

namespace App\Casts;

use App\Models\Option;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use \App\Models\Attribute;

class Detail implements CastsAttributes
{

    public $attribute;
    public $option;

    public function get($model, $key, $value, $attributes)
    {
        $details = [];


        $attributes = json_decode($value, true);


        foreach ($attributes as $key => $value) {

            $attribute = Attribute::find($key);

            if (!$attribute)
                continue;

            switch ($attribute->type) {
                case "SELECT":
                    if ($option = Option::find($value))
                        $details[$attribute->title] = $option->title;
                    break;
                case "MULTI_SELECT":
                    if (is_array($value))
                        foreach (Option::find($value) as $option)
                            $details[$attribute->title][] = $option->title;
                    break;
                case "BOOLEAN":
                    if ($value)
                        $details[$attribute->title] = 'Yes';
                    else
                        $details[$attribute->title] = 'No';
                    break;
                default:
                    $details [$attribute->title] = $value;
            }

        }


        return $details;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param array $value
     * @param array $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return json_encode($value);
    }
}

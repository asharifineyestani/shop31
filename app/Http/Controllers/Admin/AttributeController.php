<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AttributeResource;
use App\Models\Attribute;
use App\Models\Option;
use Illuminate\Http\Request;

class AttributeController extends Controller
{

    public function store(Request $request)
    {
        $attributeFields = $request->except('options');
        $optionsFields = $request->get('options');

        $newRow = Attribute::create($attributeFields);


        if (is_array($optionsFields))
            foreach ($optionsFields as $optionFields)
                $options[] = new Option(["title" => $optionFields]);

        if (isset($options) && count($options) > 0)
            $newRow->options()->saveMany($options);


        return new AttributeResource(Attribute::where('id', $newRow->id)->with('options')->first());
    }
}

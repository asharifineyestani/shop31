<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Option;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    //

    public function index(Request $request)
    {
        $query = Attribute::query();

        foreach ($request->get('filters') ?? [] as $key => $value)
            $query = $query->where($key , $value);

        return $query->get();
    }

    public function update(Request $request , $id)
    {

        return Attribute::where('id',$id)->update($request->only('title','type'));
    }


    public function store(Request $request )
    {
        return Attribute::create($request->all());
    }


    public function destroy($id )
    {
        return Attribute::where('id',$id)->delete();
    }
}

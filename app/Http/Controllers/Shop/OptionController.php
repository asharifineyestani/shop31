<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    //

    public function index(Request $request)
    {
        $query = Option::query();

        foreach ($request->get('filters') ?? [] as $key => $value)
            $query = $query->where($key , $value);

        return $query->get();
    }

    public function update(Request $request , $id)
    {
        return Option::where('id',$id)->update($request->only('title'));
    }


    public function store(Request $request )
    {
        return Option::create($request->all());
    }


    public function destroy($id )
    {
        return Option::where('id',$id)->delete();
    }
}

<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\APIController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends APIController
{
    public function index(Request $request)
    {

        return Product::all();
//        $query = Product::select('*')
//            ->with(['brand', 'category'])
//            ->limit(3);
//
//
//        $query = $query->hasPagination($request)->hasPublicFilters($request);
//
//        $query = $query->hasFilterAttribute($request);
//
//
//        return $query->get();
    }


    public function store(Request $request)
    {
        return Product::create($request->all());
    }


    public function update(Request $request , $id)
    {
        return Product::where('id' , $id)->update($request->except('details_view'));
    }


    public function show($id)
    {
        return $query = Product::find($id);

    }
}

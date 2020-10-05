<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIController;
use App\Http\Resources\Shop\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends APIController
{
    public function index(Request $request)
    {
        $query = Product::select('*')
            ->with(['brand', 'category'])
            ->limit(3);


        $query = $query->hasPagination($request)->hasPublicFilters($request);

        $query = $query->hasFilterAttribute($request);


        return $query->get();
    }


    public function store(Request $request)
    {
        return Product::create($request->all());
    }


    public function show($id)
    {
         $query = Product::find($id);


        return new ProductResource($query);
    }
}

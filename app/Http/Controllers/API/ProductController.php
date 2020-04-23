<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends APIController
{
    public function index(Request $request)
    {
        $query = Product::select('*')
            ->with(['brand', 'category'])
            ->limit(3);


        $query = $query->hasPagination($request);

        $query = $query->hasFilterAttribute($request->attribute);


        return $query->get();
    }


    public function store(Request $request)
    {
        return Product::create($request->all());
    }


    public function show($id)
    {
        return $query = Product::find($id);

    }
}

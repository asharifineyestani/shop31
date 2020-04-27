<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function store(Request $request)
    {
        $fields = $request->all();

        $newRow = Product::create($fields);

        return new ProductResource(Product::where('id', $newRow->id)->with(['category','brand'])->first());
    }
}

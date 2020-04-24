<?php

namespace App\Http\Controllers\API;

use  App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\Pub\CategoryCollection;
use App\Http\Resources\Pub\CategoryResource;
use App\Http\Resources\Pub\CategoryRsource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show(Request $request, Category $category)
    {
        $query = $category->with(['filters', 'products' => function ($query) use ($request) {
            return $query->hasPagination($request);
        }])->first();

        return new CategoryResource($query);
    }

}

<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //

    public function index()
    {
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();

        return $data;

    }
}

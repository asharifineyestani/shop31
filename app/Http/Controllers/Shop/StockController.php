<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\StockResource;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function store(Request $request)
    {
        $fields = $request->all();
        $newRow  =Stock::create($fields);

        return new StockResource(Stock::where('id', $newRow->id)->with(['color','product','shop'])->first());
    }
}

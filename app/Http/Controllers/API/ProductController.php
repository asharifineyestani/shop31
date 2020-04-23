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

        $p['page'] = $request->page;
        $p['per'] = $request->per;
        $p['offset'] = ($request->page - 1) * $request->per;

        $query = Product::select('*')
            ->with(['brand', 'category'])
            ->limit(3);


        if ($p['per'] && $p['page'])
            $query = $query->offset($p['offset'])
                ->limit($p['per']);

        if (isset($request->attribute)) {
            foreach ($request->attribute as $key => $value) {
                if (is_array($value)) {
                    $query = $query->whereJsonContains('details->' . $key, (int)$value[0]);
                    if (count($value) > 0)
                        for ($i = 1; $i < count($value); $i++) {
                            $query = $query->orWhereJsonContains('details->' . $key, (int)$value[$i]);
                        }
                } else
                    $query = $query->where('details->' . $key, $value);
            }
        }


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

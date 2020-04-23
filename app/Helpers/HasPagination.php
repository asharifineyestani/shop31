<?php

namespace App\Helpers;


trait HasPagination
{
    public function scopeHasPagination($query, $request)
    {
        $p['page'] = $request->page;
        $p['per'] = $request->per;
        $p['offset'] = ($request->page - 1) * $request->per;


        if ($p['per'] && $p['page'])
            $query = $query->offset($p['offset'])
                ->limit($p['per']);

        return $query;
    }

}

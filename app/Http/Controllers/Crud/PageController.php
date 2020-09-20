<?php

namespace App\Http\Controllers\Crud;

use App\Models\Page;


class PageController extends PostController
{

    public function config()
    {
        $this->crud->setEntity('pages');
        $this->crud->setModel(Page::class);
        $query = $this->crud->model::where('type', 'PAGE')->get();
        $this->crud->setQuery($query);
    }


}

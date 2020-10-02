<?php

namespace App\Http\Controllers\Crud;

use Afracode\CRUD\App\Controllers\CrudController;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends CrudController
{

    public function config()
    {
        $this->crud->setModel(Category::class);
        $this->crud->setEntity('categories');
    }
    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('title');
        $this->crud->setColumn('action');

    }

    public function setupCreate()
    {
        $this->crud->setField([
            'name' => 'title'
        ]);

        $this->crud->setField([
            'type' => 'image',
            'name' => 'avatar_path',
        ]);


        $this->crud->setField([
            'name' => 'body'
        ]);

        $this->crud->setField([
            'type' => 'attributes-table',
            'name' => 'attributes',
        ]);

    }


    public function setupEdit()
    {
        $this->setupCreate();
    }
}

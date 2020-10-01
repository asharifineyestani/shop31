<?php

namespace App\Http\Controllers\Crud;

use Afracode\CRUD\App\Controllers\CrudController;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class AttributeController extends CrudController
{

    public function config()
    {
        $this->crud->setModel(Attribute::class);
        $this->crud->setEntity('attributes');
    }

    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('title');
        $this->crud->setColumn('type');
        $this->crud->setColumn('category_id');
        $this->crud->setColumn('is_filter');
        $this->crud->setColumn('action');

    }

    public function setupCreate()
    {
        $this->crud->setField([
            'name' => 'title'
        ]);

        $this->crud->setField([
            'type' => 'options-table',
            'name' => 'options',
        ]);

    }


    public function setupEdit()
    {
        $this->setupCreate();
    }


    public function show($id)
    {
        $query = Attribute::where('id', $id)->with('options')->first();
        return $query;
    }
}

<?php

namespace App\Http\Controllers\Crud;

use Afracode\CRUD\App\Controllers\CrudController;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends CrudController
{

    public function config()
    {
        $this->crud->setModel(User::class);
        $this->crud->setEntity('users');
    }
    public function setupIndex()
    {
        $this->crud->setColumn('id');

    }

    public function setupCreate()
    {

    }


    public function setupEdit()
    {

    }
}

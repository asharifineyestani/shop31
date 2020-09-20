<?php




namespace App\Http\Controllers\Crud;

use Afracode\CRUD\App\Controllers\CrudController;
use Afracode\CRUD\App\Models\Menu;
use Illuminate\Support\Facades\Auth;


class MenuController extends CrudController
{
    public function config()
    {
        $this->crud->setModel(Menu::class);
        $this->crud->SetEntity('menu');
    }


    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('href');
        $this->crud->setColumn('icon');
        $this->crud->setColumn('permission');
        $this->crud->setColumn('action');
    }


    public function setupCreate()
    {

        $this->crud->setField([
            'name' => 'href'
        ]);

        $this->crud->setField([
            'name' => 'icon'
        ]);

        $this->crud->setField([
            'name' => 'permission'
        ]);
    }
//
//    public function index()
//    {
//
//        return  Auth::user()->with('roles')->get();;
//    }
}

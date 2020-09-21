<?php

namespace App\Http\Controllers\Crud;

use Afracode\CRUD\App\Controllers\CrudController;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Stock;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StockController extends CrudController
{

    public function config()
    {
        $this->crud->setModel(Stock::class);
        $this->crud->setEntity('stocks');
    }

    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('product_id');
        $this->crud->setColumn('quantity');
        $this->crud->setColumn('old_price')->editColumn(function ($row) {
            return number_format($row->old_price);
        });
        $this->crud->setColumn('discount_percent');
        $this->crud->setColumn('current_price')->editColumn(function ($row) {
            return number_format($row->current_price);
        });
        $this->crud->setColumn('action');

    }

    public function setupCreate()
    {
        $this->crud->setField([
            'type' => 'relation',
            'method' => 'product',
            'attribute' => 'title',
        ]);


        $this->crud->setField([
            'type' => 'number',
            'name' => 'price',
        ]);

        $this->crud->setField([
            'type' => 'number',
            'name' => 'quantity',
        ]);


        $this->crud->setField([
            'type' => 'text',
            'name' => 'discount_percent',
            'value' => 0,
        ]);

    }


    public function setupEdit()
    {
        $this->setupCreate();
    }

    public function update(Request $request, $id)
    {
        $this->crud->setRow($id);
        $this->setupEdit();


        $this->validate($request, array_merge($this->crud->getValidations()));

        //        dd($request->all());

        $input =  $fields = $this->crud->getFormInputs($request);

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));

        }



        $this->crud->row->update($input);



        if ($this->crud->hasTrait('HasRoles')) {
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            DB::table('model_has_permissions')->where('model_id', $id)->delete();
            $this->crud->row->assignRole($request->input('roles'));
            $this->crud->row->givePermissionTo($request->input('permissions'));
        }


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);

        } else {
            $input = $request->except(['password']);
        }


        if ($this->crud->hasTrait('InteractsWithMedia')) {
            $media = $this->crud->row->getMedia('*')->pluck('file_name')->toArray();

            foreach ($request->input('mediable', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $this->crud->row->addMedia(storage_path('tmp/' . $file))->toMediaCollection();
                }
            }
        }


        return redirect()->back()->with('success', trans('message.updated'));
    }


}

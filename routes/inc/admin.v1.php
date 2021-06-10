<?php

/*
|--------------------------------------------------------------------------
| Ready to use
|--------------------------------------------------------------------------
*/

Route::post('attributes',[\App\Http\Controllers\Admin\AttributeController::class,'store']);
Route::post('products',[\App\Http\Controllers\Admin\ProductController::class,'store']);
Route::resource('products',\App\Http\Controllers\Admin\ProductController::class);

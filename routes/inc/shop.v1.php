<?php

/*
|--------------------------------------------------------------------------
| Ready to use
|--------------------------------------------------------------------------
*/

Route::post('stocks',[\App\Http\Controllers\Shop\StockController::class,'store']);

Route::resource('options', \App\Http\Controllers\Shop\OptionController::class);
Route::resource('products', \App\Http\Controllers\Shop\ProductController::class);
Route::resource('attributes', \App\Http\Controllers\Shop\AttributeController::class);



Route::get('config',[\App\Http\Controllers\Shop\ConfigController::class,'index']);


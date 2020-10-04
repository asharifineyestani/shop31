<?php

/*
|--------------------------------------------------------------------------
| Ready to use
|--------------------------------------------------------------------------
*/

Route::post('stocks', 'StockController@store');

Route::resource('options', 'OptionController');
Route::resource('products', 'ProductController');
Route::resource('attributes', 'AttributeController');



Route::get('config', 'ConfigController@index');


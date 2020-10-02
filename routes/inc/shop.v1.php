<?php

/*
|--------------------------------------------------------------------------
| Ready to use
|--------------------------------------------------------------------------
*/

Route::post('stocks', 'StockController@store');

Route::resource('options', 'OptionController');
Route::resource('attributes', 'AttributeController');


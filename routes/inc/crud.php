<?php

/*
|--------------------------------------------------------------------------
| Ready to use
|--------------------------------------------------------------------------
*/


Route::resource('users', 'UserController');
Route::resource('menu', 'MenuController');
Route::resource('languages', 'LanguageController');
Route::resource('products', 'ProductController');
Route::resource('posts', 'PostController');
Route::resource('pages', 'PageController');

Route::resource('brands', 'BrandController');
Route::resource('categories', 'CategoryController');
Route::resource('stocks', 'StockController');

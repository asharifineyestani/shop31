<?php

/*
|--------------------------------------------------------------------------
| Ready to use
|--------------------------------------------------------------------------
*/


//Route::get('login',AuthController@login::class);
//Route::get('register',AuthController@register::class);


Route::crud('users', \App\Http\Controllers\Crud\UserController::class);
Route::crud('menu', \App\Http\Controllers\Crud\MenuController::class);
Route::crud('languages', \App\Http\Controllers\Crud\LanguageController::class);
Route::crud('products', \App\Http\Controllers\Crud\ProductController::class);
Route::crud('posts', \App\Http\Controllers\Crud\PostController::class);
Route::crud('pages', \App\Http\Controllers\Crud\PageController::class);

Route::crud('brands', \App\Http\Controllers\Crud\BrandController::class);
Route::crud('categories', \App\Http\Controllers\Crud\CategoryController::class);
Route::crud('stocks', \App\Http\Controllers\Crud\StockController::class);
Route::crud('attributes', \App\Http\Controllers\Crud\AttributeController::class);


Auth::routes();

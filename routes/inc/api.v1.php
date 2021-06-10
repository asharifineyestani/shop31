<?php

/*
|--------------------------------------------------------------------------
| Ready to use
|--------------------------------------------------------------------------
*/

# example: {{v1}}/products?page=1&per=10&attribute[1]=1&attribute[2]=5&attribute[3]=7&attribute[6][0]=11&attribute[6][1]=14&attribute[7]=0
Route::resource('products' ,  \App\Http\Controllers\API\ProductController::class);

Route::get('categories/{category:slug}',[ \App\Http\Controllers\API\CategoryController::class,'show']);

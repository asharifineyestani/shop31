<?php

/*
|--------------------------------------------------------------------------
| Ready to use
|--------------------------------------------------------------------------
*/

# example: {{v1}}/products?page=1&per=10&attribute[1][0]=1&attribute[2][1]=6
Route::resource('products' , 'ProductController');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



/*
|--------------------------------------------------------------------------
| Api v1
|--------------------------------------------------------------------------
|
*/
Route::group([
    'prefix'     => 'v1',
], function ($router) {
    require base_path('routes/inc/api.v1.php');
});



/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
|
*/
Route::group([
    'prefix'     => 'v1/admin',
], function ($router) {
    require base_path('routes/inc/admin.v1.php');
});


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
|
*/
Route::group([
    'prefix'     => 'v1/shop',
], function ($router) {
    require base_path('routes/inc/shop.v1.php');
});

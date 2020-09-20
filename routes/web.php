<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



/*
|--------------------------------------------------------------------------
| Dev tools
|--------------------------------------------------------------------------
|
*/
Route::group([
    'namespace'  => 'Dev',
    'prefix'     => 'dev',
], function ($router) {
    require base_path('routes/inc/dev.php');
});


/*
|--------------------------------------------------------------------------
| Dev tools
|--------------------------------------------------------------------------
|
*/
Route::group([
    'namespace'  => 'Crud',
], function ($router) {
    require base_path('routes/inc/crud.php');
});

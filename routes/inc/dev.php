<?php


Route::resource('/tests', \App\Http\Controllers\Dev\TestController::class);


Route::get('/columns/{table}',[\App\Http\Controllers\Dev\DevController::class,'getTableColumns']);
Route::get('/columns/{table}/{type]}',[\App\Http\Controllers\Dev\DevController::class,'getTableColumns']);
Route::any('/keys',[\App\Http\Controllers\Dev\DevController::class,'getKeys']);



Route::get('/clear-all', function () {
    $exitCode[] = Artisan::call('view:clear');
    $exitCode[] = Artisan::call('cache:clear');
    $exitCode[] = Artisan::call('config:cache');
    $exitCode[] = Artisan::call('route:clear');
    echo '<h1>All Sections cleared</h1>';
    echo '<br>';
    print_r($exitCode);
    die;
});

Route::get('/migrate', function () {
    $exitCode = Artisan::call('migrate');
    echo '<h1>migrate is successful</h1>';
    echo '<br>';
    echo 'exitCode: ' . $exitCode;
    die;
});

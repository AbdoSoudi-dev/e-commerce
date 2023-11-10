<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\{
    ProductsController, AdminController
};

Route::group(
    [ 'prefix' => 'dashboard',
        'as' => 'dashboard.*',
        'middleware' => 'auth:admin'
    ], function () {

    Route::view('/', 'dashboard.index');
    Route::resource('products', ProductsController::class)
        ->name('product', 'dashboard.products');

});

Route::get('/{vue_capture?}', function () {
    return view('index');
})->where('vue_capture', '[\/\w\.-]*');

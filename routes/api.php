<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{ProductsController};

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', ProductsController::class)
    ->only(['index', 'show']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;

Route::middleware('api')->group(function () {
    Route::apiResource('products', ProductController::class);
});

Route::post('/products/{product_id}/images', [ImageController::class, 'store']);
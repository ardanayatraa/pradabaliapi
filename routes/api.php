<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AksaraController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BlogCategoryController;

// Route untuk user (contoh rute bawaan)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Resource routes untuk API
Route::middleware('auth:sanctum')->group(function () {

    // Routes untuk Aksara

    // Routes untuk Blog
    Route::apiResource('blogs', BlogController::class);

    // Routes untuk Blog Categories
    Route::apiResource('blog-categories', BlogCategoryController::class);
});

Route::apiResource('aksaras', AksaraController::class);

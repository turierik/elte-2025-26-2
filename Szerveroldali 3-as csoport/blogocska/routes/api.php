<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', [ApiController::class, 'index']);
Route::get('/articles/{article}', [ApiController::class, 'show']);
Route::post('/login', [ApiController::class, 'login']);
Route::post('/articles', [ApiController::class, 'store']) -> middleware('auth:sanctum');
Route::get('/articles/{article}/categories', [ApiController::class, 'indexCategories']);
Route::patch('/articles/{article}/categories', [ApiController::class, 'updateCategories']);

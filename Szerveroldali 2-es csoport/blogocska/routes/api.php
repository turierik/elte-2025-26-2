<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/posts', [ApiController::class, 'index']);
Route::get('/posts/{post}', [ApiController::class, 'show']);
Route::post('/login', [ApiController::class, 'login']);
Route::post('/posts', [ApiController::class, 'store']) -> middleware('auth:sanctum');
Route::get('/posts/{post}/tags', [ApiController::class, 'indexTags']);
Route::patch('/posts/{post}/tags', [ApiController::class, 'updateTags']);

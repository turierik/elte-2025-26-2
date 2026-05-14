<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pizzas', [ApiController::class, 'task1']);
Route::get('/customers/{customer}/pizzas', [ApiController::class, 'task2']);
Route::post('/pizzas', [ApiController::class, 'task3']);
Route::get('/pizzas/{pizza}/toppings', [ApiController::class, 'task4']);
Route::get('/toppings', [ApiController::class, 'task5']);
Route::post('/login', [ApiController::class, 'task6']);
Route::put('/pizzas/{pizza}/toppings', [ApiController::class, 'task7'])
    -> middleware('auth:sanctum');

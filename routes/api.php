<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\JwtMiddleware;
use App\Http\Middleware\CheckAdmin;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::get('/products/images/{imageName}', [ProductController::class, 'getimage']);

    Route::middleware([CheckAdmin::class])->group(function () {
        Route::resource('/products', ProductController::class);
    });
});
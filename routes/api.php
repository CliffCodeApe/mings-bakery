<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\JwtMiddleware;
use App\Http\Middleware\CheckAdmin;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/search', [ProductController::class, 'search']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/images/{imageName}', [ProductController::class, 'getimage']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [UserController::class, 'getUser']);

    Route::post('/orders/make', [OrderController::class, 'makeOrders']);
    Route::get('/orders/user', [OrderController::class, 'userOrders']);

    Route::middleware([CheckAdmin::class])->group(function () {
        Route::post('/products', [ProductController::class, 'store']);
        Route::put('/products/{id}', [ProductController::class, 'update']);
        Route::delete('/products/{id}', [ProductController::class, 'destroy']);

        Route::get('/orders/all', [OrderController::class, 'allOrders']);
        Route::get('/orders/search', [OrderController::class, 'searchOrders']);
        Route::put('/orders/{id}/status', [OrderController::class, 'updateOrderStatus']);
    });
});

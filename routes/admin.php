<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\DashboardController;


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login', 'AuthController@authenticate')->name('authenticate');
});

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', App\Http\Controllers\AdminPanel\ProductController::class);
    Route::resource('categories', App\Http\Controllers\AdminPanel\CategoryController::class);
    Route::resource('carts', App\Http\Controllers\AdminPanel\CartController::class);
    Route::resource('orders', App\Http\Controllers\AdminPanel\OrderController::class);
    Route::resource('orderitems', App\Http\Controllers\AdminPanel\OrderItemController::class);
});


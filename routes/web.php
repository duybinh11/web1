<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemCartController;
use App\Http\Controllers\ItemDetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('ctdh/id_item/{id_item}/', [ItemDetailController::class, 'showItemDetail'])->name('ctdh');

Route::prefix('cart')->group(function () {
    Route::get('add_cart', [ItemCartController::class, 'addCartHandle'])->name('addCartHandle')->middleware('auth');
    Route::get('delete_cart/id_cart/{id_cart}', [ItemCartController::class, 'deleteCart'])->name('deleteCart')->middleware('auth');
});


Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'showLogin'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/', [LoginController::class, 'handleLogin'])->name('handleLogin');
    Route::post('register', [LoginController::class, 'handleRegister'])->name('handleRegister');
});

Route::get('order/id_cart/{id_cart}', [OrderController::class, 'showOrderDetail'])->name('orderDetail');

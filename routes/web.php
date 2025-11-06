<?php

use App\Http\Controllers\InventroyController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::resource('items', ItemController::class);
Route::get('/inventory', [InventroyController::class, 'index'])->name('inventory');
Route::get('/stock', [StockMovementController::class, 'index'])->name('stock');

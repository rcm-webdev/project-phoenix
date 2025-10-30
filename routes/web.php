<?php

use App\Http\Controllers\PhoenixController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/phoenix', [PhoenixController::class, 'index'])->name('phoenix');

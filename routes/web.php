<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CarController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing.index');
Route::get('/featured', [CarController::class, 'featured'])->name('landing.featured');
Route::get('/detail/{id}', [CarController::class, 'detail'])->name('cars.detail');



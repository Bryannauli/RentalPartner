<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;

Route::get('/', [LandingPageController::class, 'main'])->name('landing.main');

Route::get('/login', [LandingPageController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');

Route::get('/register', [LandingPageController::class, 'registerForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/index', [LandingPageController::class, 'index'])->name('landing.index');
Route::get('/featured', [CarController::class, 'featured'])->name('landing.featured');
Route::get('/detail/{id}', [CarController::class, 'detail'])->name('cars.detail');
Route::view('/upgrade', 'landing.upgrade');



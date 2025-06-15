<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;


Route::get('/', [LandingPageController::class, 'main'])->name('user.main');

Route::get('/login', [LandingPageController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');

Route::get('/register', [LandingPageController::class, 'registerForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/index', [LandingPageController::class, 'index'])->name('user.index');
Route::get('/featured', [CarController::class, 'featured'])->name('user.featured');
Route::get('/detail/{id}', [CarController::class, 'detail'])->name('cars.detail');

Route::get('/admin', [LandingPageController::class, 'admin'])->name('user.admin');
Route::get('/payment', [LandingPageController::class, 'payment'])->name('user.payment');
Route::get('/payment/process', [LandingPageController::class, 'process'])->name('payment.process');

Route::view('/upgrade', 'user.upgrade');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/owner-requests', [AdminController::class, 'ownerRequests'])->name('owner-requests');
    Route::get('/posts', [AdminController::class, 'posts'])->name('posts');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');





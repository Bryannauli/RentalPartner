<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;


Route::get('/', [LandingPageController::class, 'main'])->name('user.main');

Route::get('/home', [UserController::class, 'home'])->name('home');
Route::get('/login', [LandingPageController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');

Route::get('/register', [LandingPageController::class, 'registerForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');

Route::get('/forgot-password', [ForgotPasswordController::class, 'form'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');

Route::get('/index', [LandingPageController::class, 'index'])->name('user.index');
Route::get('/featured', [CarController::class, 'featured'])->name('user.featured');
Route::get('/detail/{id}', [CarController::class, 'detail'])->name('cars.detail');

Route::get('/admin', [LandingPageController::class, 'admin'])->name('user.admin');
Route::get('/payment', [LandingPageController::class, 'payment'])->name('user.payment');
Route::get('/payment/process', [LandingPageController::class, 'process'])->name('payment.process');
Route::get('/payment/form', [LandingPageController::class, 'form'])->name('payment.form');

Route::view('/upgrade', 'user.upgrade');
Route::post('/submit-upgrade', [UserController::class, 'submitUpgrade'])->name('upgrade.submit');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/mobil', [AdminController::class, 'mobil'])->name('mobil');
    Route::get('/posts', [AdminController::class, 'posts'])->name('posts');
    Route::get('/review', [AdminController::class, 'review'])->name('review');
    Route::get('/history', [AdminController::class, 'history'])->name('history');
    Route::get('/owner-requests', [AdminController::class, 'ownerRequests'])->name('owner-requests');
    
    
    // route kelola owner
    Route::post('/owner/approve/{id}', [AdminController::class, 'approveOwner'])->name('owner.approve');
    Route::post('/owner/reject/{id}', [AdminController::class, 'rejectOwner'])->name('owner.reject');
    Route::get('/owner/detail/{id}', [AdminController::class, 'showOwner'])->name('owner.detail');
});

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
Route::get('/owner/riwayat', [OwnerController::class, 'riwayat'])->name('owner.riwayat');
Route::get('/owner/order', [OwnerController::class, 'order'])->name('owner.order');

Route::post('/cars/{car}/review', [CarController::class, 'submitReview'])->name('cars.review')->middleware('auth');




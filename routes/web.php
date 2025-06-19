<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProfileController;
use App\Models\Owner;

Route::get('/', [LandingPageController::class, 'main'])->name('main');

// bagian autentikasi
Route::get('/register', [LandingPageController::class, 'registerForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');
Route::get('/login', [LandingPageController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// bagian forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'form'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');

// bagian user
Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    
    Route::get('/index', [LandingPageController::class, 'index'])->name('user.index');
    Route::get('/cars/search', [CarController::class, 'search'])->name('cars.search');
    Route::get('/featured', [CarController::class, 'featured'])->name('user.index');
    Route::get('/detail/{id}', [CarController::class, 'detail'])->name('cars.detail');
    
    Route::get('/payment', [LandingPageController::class, 'payment'])->name('user.payment');
    Route::get('/payment/process', [LandingPageController::class, 'process'])->name('payment.process');
    Route::get('/payment/form', [LandingPageController::class, 'form'])->name('payment.form');
    
    Route::view('/upgrade', 'user.upgrade');
    Route::post('/submit-upgrade', [UserController::class, 'submitUpgrade'])->name('upgrade.submit');
    
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('profile', ProfileController::class); 
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/owner', [AdminController::class, 'owner'])->name('owner');
    Route::get('/mobil', [AdminController::class, 'mobil'])->name('mobil');
    Route::get('/posts', [AdminController::class, 'posts'])->name('posts');
    Route::get('/review', [AdminController::class, 'review'])->name('review');
    Route::get('/history', [AdminController::class, 'history'])->name('history');
    Route::get('/owner-requests', [AdminController::class, 'ownerRequests'])->name('owner-requests');
    
    // route kelola owner
    Route::post('/admin/owners/{id}/activate', [AdminController::class, 'activateOwner'])->name('activateOwner');
    Route::post('/admin/owners/{id}/suspend', [AdminController::class, 'suspendOwner'])->name('suspendOwner');
    Route::post('/owner/approve/{id}', [AdminController::class, 'approveOwner'])->name('owner.approve');
    Route::post('/owner/reject/{id}', [AdminController::class, 'rejectOwner'])->name('owner.reject');
    Route::get('/owner/detail/{id}', [AdminController::class, 'showOwner'])->name('owner.detail');

    // route kelola post
    Route::get('/posts/detail/{id}', [AdminController::class, 'showPost'])->name('posts.show');
    Route::post('/posts/approve/{id}', [AdminController::class, 'approvePost'])->name('posts.approve');
    Route::post('/posts/reject/{id}', [AdminController::class, 'rejectPost'])->name('posts.reject');
});

Route::prefix('owner')->name('owner.')->middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('dashboard');
    Route::get('/riwayat', [OwnerController::class, 'riwayat'])->name('riwayat');
    Route::get('/order', [OwnerController::class, 'order'])->name('order');
    Route::get('/posts/info', [OwnerController::class, 'showPost'])->name('postingan');
    Route::get('/posts', [OwnerController::class, 'posts'])->name('posts');
    Route::post('/posts/store', [OwnerController::class, 'storePost'])->name('posts.store');
    Route::get('/posts/edit/{id}', [OwnerController::class, 'editPost'])->name('posts.edit');
    Route::put('/posts/update/{id}', [OwnerController::class, 'updatePost'])->name('posts.update');
});

Route::post('/cars/{car}/review', [CarController::class, 'submitReview'])->name('cars.review')->middleware('auth');




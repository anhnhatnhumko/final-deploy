<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

// ------------------------
// Auth
// ------------------------
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// ------------------------
// Dashboard (chỉ khi đăng nhập)
// ------------------------
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');

// ------------------------
// CRUD Sản phẩm (cần đăng nhập)
// ------------------------
Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

// ------------------------
// Trang chủ -> Dashboard nếu đã login
// ------------------------
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Nếu vẫn cần giữ route này thì giữ lại, nếu không thì xoá
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('products', ProductController::class);


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Login user
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Registrasi user
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/', [PublicController::class, 'home']);
Route::get('/catalog', [PublicController::class, 'catalog']);
Route::middleware(['auth'])->post('/order', [PublicController::class, 'submitOrder']);
Route::middleware(['auth'])->get('/order', [PublicController::class, 'orderForm']);
Route::get('/gallery', [PublicController::class, 'gallery']);
Route::get('/testimonials', [PublicController::class, 'testimonials']);
Route::middleware(['auth'])->post('/testimonials', [PublicController::class, 'submitTestimonial']);
Route::get('/contact', [PublicController::class, 'contactForm']);
Route::post('/contact', [PublicController::class, 'submitContact']);

/*
|--------------------------------------------------------------------------
| ADMIN AUTH ROUTES
|--------------------------------------------------------------------------
| Untuk login, logout, dan form login admin
*/

Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| ADMIN PANEL ROUTES (Terproteksi middleware admin.auth)
|--------------------------------------------------------------------------
| Semua route ini hanya bisa diakses jika sudah login sebagai admin
*/

Route::prefix('admin')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Manajemen Menu
    Route::resource('/menus', MenuController::class);

    // Manajemen Category
    Route::resource('/categories', CategoryController::class);

    // Manajemen Pesanan
    Route::resource('/orders', OrderController::class);
    Route::put('/orders/{order}/approve', [OrderController::class, 'approve'])->name('orders.approve');
    Route::put('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    Route::put('/orders/{id}/complete', [OrderController::class, 'markAsCompleted'])->name('orders.markAsCompleted');

    // Manajemen Testimoni
    Route::resource('/testimonials', TestimonialController::class);
    Route::post('/testimonials/{id}/approve', [TestimonialController::class, 'approve'])->name('testimonials.approve');

    // Manajemen Metode Pembayaran
    Route::resource('/payment-methods', PaymentMethodController::class);
    Route::put('/payment-methods/{paymentMethod}/toggle', [PaymentMethodController::class, 'toggleStatus'])->name('payment-methods.toggle');

    // Laporan
    Route::get('/reports', [ReportController::class, 'index']);
    Route::get('/reports/export-excel', [ReportController::class, 'exportExcel'])->name('reports.export.excel');
    Route::get('/reports/export-pdf', [ReportController::class, 'exportPdf'])->name('reports.export.pdf');

    // Manajemen Galeri
    Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
    Route::post('/galleries/{id}/approve', [GalleryController::class, 'approve'])->name('galleries.approve');
    Route::delete('/galleries/{id}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
});
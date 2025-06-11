<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TestimonialController;

Route::get('/', [PublicController::class, 'home']);
Route::get('/catalog', [PublicController::class, 'catalog']);
Route::get('/order', [PublicController::class, 'orderForm']);
Route::post('/order', [PublicController::class, 'submitOrder']);
Route::get('/gallery', [PublicController::class, 'gallery']);
Route::get('/testimonials', [PublicController::class, 'testimonials']);
Route::post('/testimonials', [PublicController::class, 'submitTestimonial']);
Route::get('/contact', [PublicController::class, 'contactForm']);
Route::post('/contact', [PublicController::class, 'submitContact']);

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/menus', MenuController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/testimonials', TestimonialController::class);
    Route::get('/reports', [ReportController::class, 'index']);
});
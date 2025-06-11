<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\GalleryController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [PublicController::class, 'home']);
Route::get('/catalog', [PublicController::class, 'catalog']);
Route::get('/order', [PublicController::class, 'orderForm']);
Route::post('/order', [PublicController::class, 'submitOrder']);
Route::get('/gallery', [PublicController::class, 'gallery']);
Route::get('/testimonials', [PublicController::class, 'testimonials']);
Route::post('/testimonials', [PublicController::class, 'submitTestimonial']);
Route::get('/contact', [PublicController::class, 'contactForm']);
Route::post('/contact', [PublicController::class, 'submitContact']);

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Menu Management
    Route::resource('/menus', MenuController::class);

    // Order Management
    Route::resource('/orders', OrderController::class);

    // Testimonial Management
    Route::resource('/testimonials', TestimonialController::class);
    Route::post('/testimonials/{id}/approve', [TestimonialController::class, 'approve'])->name('testimonials.approve');

    // Report
    Route::get('/reports', [ReportController::class, 'index']);
    Route::get('/reports/export-excel', [ReportController::class, 'exportExcel'])->name('reports.export.excel');
    Route::get('/reports/export-pdf', [ReportController::class, 'exportPdf'])->name('reports.export.pdf');


    // Gallery Managements
    Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
    Route::post('/galleries/{id}/approve', [GalleryController::class, 'approve'])->name('galleries.approve');
    Route::delete('/galleries/{id}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
});

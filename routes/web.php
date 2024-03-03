<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\CategoriController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Petugas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class)->middleware('admin');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('product', ProductController::class);
    Route::resource('Transaksi', TransaksiController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('categori', CategoriController::class);
    Route::get('/get-product-details/{id}',[TransaksiController::class,'getProductDetails'])->name('getProductDetails');
});


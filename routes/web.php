<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', [AuthController::class, 'create'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {

    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::delete('/register/{id}/delete', [AuthController::class, 'destroy'])->name('delete_user');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('/register/{id}/delete', [AuthController::class, 'destroy'])->name('delete_user');

    // Barang
    Route::get('/barangs/trash', [BarangController::class, 'trash'])->name('barangs.trash');
    Route::put('/barangs/{id}/restore', [BarangController::class, 'restore'])->name('barangs.restore');
    Route::delete('/barangs/{id}/force-delete', [BarangController::class, 'forceDelete'])->name('barangs.forceDelete');

    Route::resource('barangs', BarangController::class);

    // Kategori
    Route::resource('kategoris', KategoriController::class);

    // User
    Route::resource('users', UserController::class);

});
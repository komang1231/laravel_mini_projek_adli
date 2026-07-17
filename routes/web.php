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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/profile/password', [UserController::class, 'editPassword'])->name('profile.password');
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('profile.password.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('/register/{id}/delete', [AuthController::class, 'destroy'])->name('delete_user');

    // Trash Barang
    Route::get('/barangs/trash', [BarangController::class, 'trash'])->name('barangs.trash');
    Route::put('/barangs/{id}/restore', [BarangController::class, 'restore'])->name('barangs.restore');
    Route::delete('/barangs/{id}/force-delete', [BarangController::class, 'forceDelete'])->name('barangs.forceDelete');
    // Trash Kategori
    Route::get('/kategoris/trash', [KategoriController::class, 'trash'])->name('kategoris.trash');
    Route::put('/kategoris/{id}/restore', [KategoriController::class, 'restore'])->name('kategoris.restore');
    Route::delete('/kategoris/{id}/force-delete', [KategoriController::class, 'forceDelete'])->name('kategoris.forceDelete');

    // CRUD BARANG & KATEGORI
    Route::resource('barangs', BarangController::class);
    Route::resource('kategoris', KategoriController::class);

    // Trash & CRUD User
    Route::get('/users/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::put('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('/users/{id}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
    Route::resource('users', UserController::class);
});

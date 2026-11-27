<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Area Khusus Admin
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
        // Nabila akan menambahkan route categories & menus di sini
        // Husain akan menambahkan route users di sini
        // Sigit akan menambahkan route export/import di sini
    });

    // Area Khusus Kasir (Admin juga boleh akses jika perlu)
    Route::middleware('role:kasir,admin')->prefix('kasir')->name('kasir.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'kasir'])->name('dashboard');
        // Raffi akan menambahkan route pos, struk, & antrean di sini
    });
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


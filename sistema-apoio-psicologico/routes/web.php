<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::resource('users', UserController::class);


Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\AgendarConsultaController;
Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::resource('users', UserController::class);


Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');


Route::get('/agendar-consulta', [AgendarConsultaController::class, 'index'])->name('agendar.consulta');
Route::post('/agendar-consulta', [AgendarConsultaController::class, 'store'])->name('agendar.consulta.store');


Route::get('/home', [ConsultaController::class, 'mostrarConsultas'])->name('pages.home');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


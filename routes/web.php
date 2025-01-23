<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('login', [AuthController::class, 'auth_login'])->name('auth.auth_login');
Route::get('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('register', [AuthController::class, 'create_user'])->name('auth.create_user');
Route::get('verify/{token}', [AuthController::class, 'verify'])->name('auth.verify');
Route::get('forgot_password', [AuthController::class, 'forgot_password'])->name('auth.forgot_password');
Route::post('forgot_password', [AuthController::class, 'forgot_password_reset'])->name('auth.forgot_password_reset');
Route::get('reset/{token}', [AuthController::class, 'reset'])->name('auth.reset');
Route::post('reset/{token}', [AuthController::class, 'post_reset'])->name('auth.post_reset');

// Home
Route::get('/', [HomeController::class, 'home'])->name('home.home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/// Halaman pertama langsung tampil login
Route::get('/', function () {
    return view('sign-in'); // ← ganti dari 'welcome' ke 'sign-in'
})->name('sign-in');

/// Halaman registrasi
Route::get('/sign-up', function () {
    return view('sign-up'); 
})->name('sign-up');

Route::post('/register', [AuthController::class, 'register'])->name('register');

/// Login (form sudah dari /, jadi ini untuk proses login)
Route::post('/login', [AuthController::class, 'login'])->name('login');

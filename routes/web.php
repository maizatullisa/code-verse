<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

/// Halaman awal: login
Route::get('/', function () {
    return view('sign-in');
})->name('sign-in');

/// Halaman registrasi
Route::get('/sign-up', function () {
    return view('sign-up'); 
})->name('sign-up');

/// Aksi kirim form register
Route::post('/register', [AuthController::class, 'register'])->name('register');

/// Aksi kirim form login
Route::post('/login', [AuthController::class, 'login'])->name('login');

/// Halaman setelah login berhasil
Route::get('/home', function () {
    return view('home'); // pastikan file resources/views/home.blade.php ada
})->name('home');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\QuizController;
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

//google auth 
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

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
/// Redirect jika akses GET ke /login
Route::get('/login', function () {
    return redirect('/home');
});

/// Halaman setelah login berhasil
Route::get('/home', function () {
    return view('home'); // pastikan file resources/views/home.blade.php ada
})->name('home');

//QUIZ
Route::get('/quizzes', [QuizController::class, 'index']);
Route::post('/quizzes', [QuizController::class, 'store']);

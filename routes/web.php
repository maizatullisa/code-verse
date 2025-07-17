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

Route::get('/home', function () {
    return view('home');
})->name('home');


//registrasi
Route::get('/sign-up', function () {
    return view('sign-up'); 
})->name('sign-up');
Route::post('/register', [AuthController::class, 'register'])->name('register');
//login
Route::get('/sign-in', function () {
    return view('sign-in');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');
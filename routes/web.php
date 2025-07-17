<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use function Termwind\renderUsing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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

/// Halaman setelah login berhasil DIA AKAN KE HOME
Route::get('/home', function () {
    return view('home'); 
})->name('home');

Route::get('/profile', function () {
    return view('my-profile');
})->name('profile');
// SEARCH
Route::get('/search-result', function(){
    return view(view:'contest-search-result');
})->name(name:'search-result');

//REKOMENDASI MATERI SEE ALL
Route::get('/contest', function(){
    return view(view:'upcoming-contest');
})->name(name:'contest');


//ROUTE NAVBAR SAMPING KIRI (KOMPONEN DAN KAWAN KAWANNYA)
//PENGATURAN START
Route::get('/settings', function(){
    return view(view: 'settings');
})->name('settings');

Route::get('/details', function(){
    return view(view:'verify-details');
})->name(name:'details');

Route::get('/notification', function(){
    return view(view:'notification-setting');
})->name(name:'notification');
//PENGATURAN END

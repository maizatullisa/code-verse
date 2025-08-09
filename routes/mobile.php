<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriMobileController;

Route::view('/masuk', 'masuk')->name('masuk');
Route::view('/pilih-kelas', 'mobile.pilih-kelas')->name('pilih.kelas');
Route::view('/dashboard', 'mobile.dashboard-mobile')->name('dashboard');
Route::get('/materi', [MateriMobileController::class, 'index'])->name('materi');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriPengajarController;

Route::view('/masuk', 'masuk')->name('masuk');
Route::view('/dashboard', 'pengajar.dashboard-pengajar')->name('dashboard');
Route::get('/materi', [MateriPengajarController::class, 'index'])->name('materi');

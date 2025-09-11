<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\AdminLihatKelasController;
use App\Http\Controllers\AdminInfoSertifikatController;
use App\Http\Controllers\AdminPengajarController;
use App\Http\Controllers\AdminUserController;

use function PHPUnit\Framework\returnSelf;




  Route::get('/admin/login', function () {
    return view('admin.login-admin');
    })->name('login-admin');
    
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Manajemen user
    Route::get('/admin/user/create', [AdminController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user', [AdminController::class, 'store'])->name('admin.users.store');

    Route::get('/admin/user', [AdminUserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/user/show', function () {
            return view('admin.user.show');
                })->name('admin.user.show');
    Route::get('admin/users/download', [AdminUserController::class, 'download'])->name('admin.user.download');
    // Manajemen kelas
    Route::get('/admin/kelas', [AdminKelasController::class, 'index'])->name('admin.kelas.index');
    // Manajemen pengajar
    Route::get('/admin/pengajar', [AdminPengajarController::class, 'index'])->name('admin.pengajar.index');
    Route::get('/admin/pengajar/{user}/edit', [AdminPengajarController::class, 'edit'])->name('admin.pengajar.edit');
    Route::put('/admin/pengajar/{user}', [AdminPengajarController::class, 'update'])->name('admin.pengajar.update');
    Route::delete('/admin/pengajar/{user}', [AdminPengajarController::class, 'destroy'])->name('admin.pengajar.destroy');
    Route::get('/admin/pengajar/download', [AdminPengajarController::class, 'download'])->name('admin.pengajar.download');

    Route::get('admin/info-sertifikat', [AdminInfoSertifikatController::class, 'index']) ->name('admin.sertifikat.index');
    Route::get('info-sertifikat/download/{filename}', [AdminInfoSertifikatController::class, 'download'])
        ->name('admin.info-sertifikat.download');
    // Manajemen user
    Route::get('/admin/user/create', [AdminController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user', [AdminController::class, 'store'])->name('admin.users.store');

    Route::get('/admin/user', [AdminUserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/user/show', function () {
        return view('admin.user.show');
    })->name('admin.user.show');
    // Manajemen kelas
    Route::get('/admin/kelas', [AdminKelasController::class, 'index'])->name('admin.kelas.index');
    Route::get('/admin/kelas-download', [AdminKelasController::class, 'download'])->name('admin.kelas.download');
    Route::delete('/admin/kelas/{id}', [AdminKelasController::class, 'destroy'])
    ->name('admin.kelas.destroy');
    Route::get('/admin/{kelasId}/kelas-lihat', [AdminLihatKelasController::class, 'index'])->name('admin.lihat.kelas');
    // Manajemen pengajar
    Route::get('/admin/pengajar', [AdminPengajarController::class, 'index'])->name('admin.pengajar.index');
    Route::get('/admin/pengajar/{user}/edit', [AdminPengajarController::class, 'edit'])->name('admin.pengajar.edit');
    Route::put('/admin/pengajar/{user}', [AdminPengajarController::class, 'update'])->name('admin.pengajar.update');
    Route::delete('/admin/pengajar/{user}', [AdminPengajarController::class, 'destroy'])->name('admin.pengajar.destroy');


   
});

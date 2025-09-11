<?php

use App\Http\Controllers\PengajarSiswaListController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\HalamanQuizController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\BalasanDiskusiController;
use App\Http\Controllers\PengajarDashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriShowController;
use App\Http\Controllers\ProfilePengajarController;
use App\Http\Controllers\KelasQuizController;
use App\Http\Controllers\HalamanMateriController;
use function PHPUnit\Framework\returnSelf;

Route::get('/pengajar', function(){
    return view('pengajar');
})->name('pengajar');
Route::get('/pengajar/materi', function () {
    return view('pengajar.materi.index-materi-pengajar');
})->name('pengajar.materi.index');
Route::middleware(['auth', 'role:pengajar'])->group(function () {
    Route::get('/pengajar/dashboard', [PengajarDashboardController::class, 'index'])
        ->name('pengajar.dashboard');
    Route::get('/pengajar/siswa', [PengajarSiswaListController::class, 'index'])->name('pengajar.siswa');
        Route::get('/bio-pengajar', [ProfilePengajarController::class, 'index'])->name('pengajar.index-bio');
    Route::get('/pengajar/biodata/edit', [ProfilePengajarController::class, 'edit'])->name('pengajar.edit-bio');
    Route::post('/pengajar/biodata', [ProfilePengajarController::class, 'store'])->name('pengajar.store-bio');
    Route::put('/pengajar/biodata/update', [ProfilePengajarController::class, 'update'])->name('pengajar.update-bio');
    // riwayat pendidikan
    Route::post('/pengajar/pendidikan', [ProfilePengajarController::class, 'storeRiwayatPendidikan'])->name('pengajar.store-riwayat');
    Route::put('/pengajar/pendidikan/{id}', [ProfilePengajarController::class, 'updateRiwayatPendidikan'])->name('pengajar.update-riwayat');
    Route::delete('/pengajar/pendidikan/{id}', [ProfilePengajarController::class, 'destroyRiwayatPendidikan'])->name('pengajar.delete-riwayat');
    Route::get('/pengajar/kelas', [KelasController::class, 'index'])->name('pengajar.materi.index-kelas-pengajar');
    // Form Buat Kelas
    Route::get('/pengajar/kelas/create', [KelasController::class, 'create'])->name('pengajar.kelas.create');
    // Simpan Kelas
    Route::post('/pengajar/kelas', [KelasController::class, 'store'])->name('pengajar.kelas.store');
    // Detail Kelas (Kelola - lihat materi dalam kelas)
    Route::get('/pengajar/kelas/{kelas}', [KelasController::class, 'show'])->name('pengajar.kelas.show');
    // Form Edit Kelas
    Route::get('/pengajar/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('pengajar.kelas.edit');
    // Update Kelas
    Route::put('/pengajar/kelas/{kelas}', [KelasController::class, 'update'])->name('pengajar.kelas.update');
    // Hapus Kelas
    Route::delete('/pengajar/kelas/{kelas}', [KelasController::class, 'destroy'])->name('pengajar.kelas.destroy');
    Route::get('/pengajar/kelas/{kelasId}/materi', [MateriController::class, 'index'])
    ->name('pengajar.materi.index');
    Route::get('/pengajar/materi/create/{kelasId?}', [MateriController::class, 'create'])
    ->name('pengajar.materi.create');
    Route::post('/pengajar/materi/create/{kelasId?}', [MateriController::class, 'store'])
        ->name('pengajar.materi.store');
    //  Materi - detail materi
    Route::get('/pengajar/materi/{materi}', [MateriController::class, 'show'])->name('pengajar.materi.show');
    //  Materi - edit materi
    Route::get('/pengajar/materi/{materi}/edit', [MateriController::class, 'edit'])->name('pengajar.materi.edit');
    //  Materi - update materi
    Route::put('/pengajar/materi/{materi}', [MateriController::class, 'update'])->name('pengajar.materi.update');
    //  Materi - hapus materi
    Route::delete('/pengajar/materi/{materi}', [MateriController::class, 'destroy'])->name('pengajar.materi.destroy');
    Route::get('/pengajar/quiz', [QuizController::class, 'listQuiz'])->name('pengajar.quiz.listquiz');
    Route::get('/pengajar/quiz/{materi}', [QuizController::class, 'create'])->name('pengajar.quiz.create');
    Route::post('/pengajar/quiz/store', [QuizController::class, 'store'])->name('pengajar.quiz.store');
    Route::get('/pengajar/quiz/question/create/{quiz_id}',[QuizController::class,'createQuizQuestion'])->name('pengajar.quiz.question.create');
    Route::post('/pengajar/quiz/question/store',[QuizController::class,'storeQuestion'])->name('pengajar.quiz.question.store');
    Route::delete('/pengajar/quiz/{quiz}',[QuizController::class,'destroy'])->name('pengajar.quiz.destroy');
    Route::get('/quiz/{quiz}/detail', [HalamanQuizController::class, 'show'])->name('quiz.preview');
    Route::get('/pengajar/{materi}/preview-materi', [HalamanMateriController::class, 'index'])
            ->name('materi.preview');
    Route::get('/pengajar/forum/{kelas}', [DiskusiController::class, 'materiDiskusi'])->name('pengajar.forum.show');
    Route::get('/pengajar/kelas/{kelas}/forum', [DiskusiController::class, 'index'])->name('forum.pengajar');
    Route::post('/pengajar/kelas/{kelas}/diskusi', [DiskusiController::class, 'store'])->name('diskusi.store');
    Route::post('/pengajar/diskusi/{diskusi}/balasan', [BalasanDiskusiController::class, 'store'])->name('balasan.store');
    Route::get('/pengajar/forum/like/{diskusi}', [DiskusiController::class, 'diskusiSuka'])->name('forum.diskusi.like');

});
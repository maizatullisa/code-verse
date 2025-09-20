<?php

use App\Http\Controllers\ForumSiswa;
use App\Http\Controllers\KelasDiambilController;
use App\Http\Controllers\KelasDitawarkanController;
use App\Http\Controllers\KelasMateriController;
use App\Http\Controllers\KelasIndexController;
use App\Http\Controllers\KelasQuizController;
use App\Http\Controllers\KelasSelesaiController;
use App\Http\Controllers\KelasPreviewController;
use App\Http\Controllers\LihatDetailPengajarController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SertifikatSiswaController;
use App\Http\Controllers\CourseEnrollmentController;
use App\Http\Controllers\KelasDetailController;

use function PHPUnit\Framework\returnSelf;

Route::get('/masuk', function () {
    return view('desktop.lorek-desktop');
});



Route::middleware(['auth', 'role:siswa'])->group(function () {

 Route::get('desktop/user-desktop', [UserProfileController::class, 'dashboardUserDesktop'])->name('user.desktop');
 Route::get('/user/profile/edit', [UserProfileController::class, 'edit'])->name('user.profile.edit');
 Route::post('/profile/update', [UserProfileController::class, 'update'])->name('user.profile.update');
//dashboard siswa
Route::get('/desktop/home-desktop', [LihatDetailPengajarController::class, 'index'])
        ->name('desktop.dashboard-user-desktop');
//enrollemnt kelas siswa
Route::get('/kelas/{kelas}/pendaftaran', [CourseEnrollmentController::class, 'create'])->name('desktop.pages.kelas.kelas-pendaftaran');
Route::post('/kelas/{kelas}/pendaftaran', [CourseEnrollmentController::class, 'store'])
    ->name('enrollments.store');
//kelas show index
Route::get('/desktop/kelas-index', [KelasIndexController::class, 'index'])->name('kelas.index');
Route::get('/kelas/load-more', [KelasIndexController::class, 'loadMore'])->name('kelas.load-more');
//kelas ditawarkan
Route::get('/desktop/kelas-ditawarkan', [KelasDitawarkanController::class, 'tampil'])->name('kelas.ditawarkan');
//kelas diambil
Route::get('/desktop/kelas-diambil', [KelasDiambilController::class, 'index'])->name('kelas.diambil');
//kelas detail
Route::get('/desktop/kelas/{kelas}/detail', [KelasDetailController::class, 'show'])
    ->name('kelas.detail');
//forum siswa
Route::get('/desktop/forum-siswa/{kelasId}', [ForumSiswa::class, 'forumSiswa'])->name('forum.siswa');
Route::get('/forum/{kelas}', [ForumSiswa::class, 'index'])
    ->name('desktop.pages.forum.forum-siswa');
Route::post('/desktop/kelas/{kelas}/diskusi', [ForumSiswa::class, 'store'])->name('forum.siswa.store');
Route::post('/desktop/diskusi/{diskusi}/balasan', [ForumSiswa::class, 'siswaDiskusi'])->name('forum.siswa.balas');
Route::get('/desktop/forum/like/{diskusi}', [ForumSiswa::class, 'diskusiSuka'])->name('forum.siswa.like');
Route::post('/desktop/diskusi/{diskusi}/balasan', [ForumSiswa::class, 'siswaBalasan'])->name('forum.siswa.balas');
Route::get('/forum/progress/{kelasId}', [ForumSiswa::class, 'userProgress']);
//kelas quiz
Route::get('/kelas/{kelasId}/materi/{materiId}/quiz', [KelasQuizController::class, 'tampilQuiz'])->name('student.quiz.index');
//kelas materi siswa
Route::get('/kelas/{kelasId}/materi/{materiId?}', [KelasMateriController::class, 'showCourseMateri'])
     ->name('student.course.materi');
// Submit jawaban quiz
Route::post('/kelas/quiz/{quizId}/submit', [KelasMateriController::class, 'submitQuiz'])
     ->name('student.quiz.submit');
// Tandai materi selesai
Route::post('/kelas/{kelasId}/materi/{materiId}/mark-complete',[KelasMateriController::class, 'markComplete'])
     ->name('student.materi.complete');
// Load konten materi (video/teks)
Route::get('/kelas/materi/{materiId}/load-content', [KelasMateriController::class, 'loadMateriContent'])
     ->name('student.materi.content');
Route::get('/api/courses/{id}/materials', [KelasMateriController::class, 'apiGetMateri']);
Route::get('/kelas/{kelasId}/materi/{materiId}/next', [KelasMateriController::class, 'nextMateri'])
    ->name('student.materi.next');
Route::get('/kelas/{kelasId}/materi/{materiId}/previous', [KelasMateriController::class, 'previousMateri'])
    ->name('student.materi.previous');
Route::get('/kelas/{kelasId}/completed', [KelasMateriController::class, 'courseCompleted'])
    ->name('student.course.completed');
//rute untuk melihat detail pengajar biodata
Route::get('/profile/pengajar/{id}', [LihatDetailPengajarController::class, 'show'])
        ->name('profile-pengajar');
Route::get('/desktop/kelas-selesai', [KelasSelesaiController::class, 'index'])
->name('kelas.selesai');
Route::get('/desktop/{kelas}/kelas-preview', [KelasPreviewController::class, 'index'])->name('kelas.preview');
Route::get('/desktop/form-sertifikat/{kelasId}', [SertifikatSiswaController::class, 'index'])
    ->name('desktop.pages.sertifikat.form-sertif');

Route::post('/desktop/form-sertifikat/{kelasId}/generate', [SertifikatSiswaController::class, 'generate'])
    ->name('sertifikat.generate');
Route::get('/download/sertifikat/{filename}', [SertifikatSiswaController::class, 'download']);
Route::get('/validasi-sertifikat/{nomor}', [SertifikatSiswaController::class, 'validasi'])
    ->name('sertifikat.validasi');

 //DESKTOP INDEX SERTTIF
  Route::get('/desktop/sertifikat', function () {
    return view('desktop.pages.sertifikat.index-sertif');
 })->name('desktop.pages.sertifikat.index-sertif');
 Route::get('/kelas-diambil', [CourseEnrollmentController::class, 'index'])
    ->name('desktop.pages.kelas.kelas-diambil');
});


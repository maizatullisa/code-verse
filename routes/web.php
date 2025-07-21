<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ForumDiskusiController;
use App\Http\Controllers\QuizController;


use function PHPUnit\Framework\returnSelf;

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
//PERTAMA
Route::get('/', function(){
    return view(view:'index');
})->name(name:'index');

/// Halaman awal: login
Route::get('/masuk', function () {
    return view('masuk');
})->name('masuk');

/// Halaman registrasi
Route::get('/register', function () {
    return view('register'); 
})->name('register');

/// Aksi kirim form register
Route::post('/register', [AuthController::class, 'register'])->name('register');

/// Aksi kirim form login
Route::post('/login', [AuthController::class, 'login'])->name('login');
/// Redirect jika akses GET ke /login
Route::get('/login', function () {
    return redirect('/home');
});

/// Halaman setelah login berhasil DIA AKAN KE HOME
Route::get('/home', function () {
    return view('home'); 
})->name('home');

Route::get('/profile', function () {
    return view('my-profile');
})->name('profile');

// SEARCH
Route::get('/search-result', function(){
    return view('contest-search-result');
})->name('search-result');

// REKOMENDASI MATERI SEE ALL
//Route::get('/contest', function(){
    //return view('upcoming-contest');
///)->name('contest');

//PENGAJAR TERBAIK
Route::get('/pengajar', function(){
    return view(view:'pengajar');
})->name(name:'pengajar');

//SEE ALL MATERI YGY 
Route::get('/materi', function(){
    return view(view:'materi');
})->name(name:'materi');

// ROUTE NAVBAR SAMPING KIRI (KOMPONEN DAN KAWAN KAWANNYA)
// PENGATURAN START
Route::get('/settings', function(){
    return view('settings');
})->name('settings');

Route::get('/details', function(){
    return view('verify-details');
})->name('details');

Route::get('/notification', function(){
    return view('notification-setting');
})->name('notification');
// PENGATURAN END


//NAVBAR BAWAH
Route::get('/box', function (){
    return view(view:'chat-box');
})->name(name:'box');
//LIBRARY
Route::get('/library', function(){
    return view(view:'library');
})->name(name:'library');

//KELAS
Route::get('/kelas', function(){
    return view(view:'kelas');
})->name(name:'kelas');
//ini tambahan dari MAIZ, jangan diubah dulu,\ini ro
//rute siswa
// tampilan kuis khusus siswa (untuk ngerjakan kuiz)
Route::get('/materi/{materi}/quiz/view', [QuizController::class, 'showByMateri'])->name('quiz.view');
Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quiz.submit');

//rute pengajar
//forumdiskusi 
Route::post('/(forumdiskusi)', [ForumDiskusiController::class, 'store'])->name('forum-diskusi.store');
//quizcontroller
//khusus pengajar
//menampiljan semua kuis (dipakai pengajar untuk melihat semua quiz)
Route::get('/materi/{materi}/quiz', [QuizController::class, 'index']);
//untuk menyimpan kuis baru (dari form pengajar)
Route::post('/materi/{materi}/quiz', [QuizController::class, 'store']);
// hapus kuis beserta pertanyaan dan opsi (khusus pengajar)
Route::delete('/quiz/{id}/delete', [QuizController::class, 'destroy']);
//edit
Route::get('/materi/{materi}/quiz/edit', [QuizController::class, 'edit']);
//simpan hasil edit
Route::put('/materi/{materi}/quiz', [QuizController::class, 'update']);
//hasilscrore
Route::get('/quiz/{quiz}/results', [QuizController::class, 'results'])->name('quiz.results');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ForumDiskusiController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RangkumanController;
use App\Http\Controllers\BasicQuizController;


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
// MOBILE
//google auth 
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
//PERTAMA
Route::get('/', function(){
    return view(view:'landing');
})->name(name:'landing');

/// Halaman awal: login
Route::get('/masuk', function () {
    return view('masuk');
})->name('masuk');

// LUPA PASWORD
Route::get('/pw', function () {
    return view('lupa-pw');
})->name('pw');

Route::get('/bikin-pw', function () {
    return view('bikin-pw');
})->name('bikin-pw');

Route::get('/otp', function () {
    return view('veriv-otp');
})->name('otp');

Route::get('/pw-baru', function () {
    return view('pw-baru-sukses');
})->name('pw-baru');

/// Halaman registrasi
Route::get('/register', function () {
    return view('register'); 
})->name('register');

Route::get('/berhasil', function () {
    return view('berhasil'); 
})->name('berhasil');

/// Aksi kirim form register
Route::post('/register', [AuthController::class, 'register'])->name('register');

/// Aksi kirim form login
Route::post('/masuk', [AuthController::class, 'login'])->name('login');
/// Redirect jika akses GET ke /login

//LOGIN DUMMY
Route::get('/home', function(){
    return view('home');
})->name('home');


//LOGIN DNGN MIDLEWARE SEMENTARA DI COMENT DULU
// Route::get('/home', function () {
//  $user = Auth::user(); // ambil user login
// return view('home', compact('user'));
// })->middleware('auth')->name('home');


// Route::get('/profile', function () {
//     $user = Auth::user(); // ambil user login
//     return view('my-profile', compact('user'));
// })->middleware('auth')->name('profile');


// SEARCH
Route::get('/search-result', function(){
    return view('contest-search-result');
})->name('search-result');

// REKOMENDASI MATERI SEE ALL
//Route::get('/contest', function(){
    //return view('upcoming-contest');
//)->name('contest');

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

//QUIZZ
Route::get('/detail', function(){
    return view(view:'quiz-details');
})->name(name:'/detail');

//QUIZ 1 DUMMY
Route::get('/quiz-1', function(){
    return view(view:'dasar-quiz-1');
})->name(name:'/quiz-1');

Route::get('/quiz-2', function(){
    return view(view:'dasar-quiz-2');
})->name(name:'/quiz-2');

Route::get('/quiz-3', function(){
    return view(view:'dasar-quiz-3');
})->name(name:'/quiz-3');

Route::get('/quiz-4', function(){
    return view(view:'dasar-quiz-4');
})->name(name:'/quiz-4');

Route::get('/quiz-5', function(){
    return view(view:'dasar-quiz-5');
})->name(name:'/quiz-4');

//ini tambahan dari MAIZ, jangan diubah dulu,\ini ro
//rute siswa
// tampilan kuis khusus siswa (untuk ngerjakan kuiz)
Route::get('/materi/{materi}/quiz/view', [QuizController::class, 'showByMateri'])->name('quiz.view');
Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quiz.submit');

//rute pengajar
//forumdiskusi 
// DASHBOARD PENGAJAR
Route::get('/pengajar/dashboard', function () {
    return view('pengajar.dashboard_pengajar');
})->name('pengajar.dashboard');
// Materi - list semua materi pengajar
Route::get('/pengajar/materi', function () {
    return view('pengajar.materi.index-materi-pengajar');
})->name('pengajar.materi.index');
// Materi - form tambah materi
Route::get('/pengajar/materi/create', function () {
    return view('pengajar.materi.buat-materi-pengajar');
})->name('pengajar.materi.create');
// Quiz - pengajar melihat dan mengelola quiz
Route::get('/pengajar/quiz', function () {
    return view('pengajar.quiz.quiz-pengajar');
})->name('pengajar.quiz.index');
// Forum - forum diskusi pengajar
Route::get('/pengajar/forum', function () {
    return view('pengajar.forum.forum-pengajar');
})->name('pengajar.forum.index');


/// ADM
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard-admin');
})->name('admin.dashboard');

Route::get('/admin/user', function () {
    return view('admin.user.index');
})->name('admin.user.index');

Route::get('/admin/user/show', function () {
    return view('admin.user.show');
})->name('admin.user.show');

Route::get('/admin/pengajar', function () {
    return view('admin.pengajar.index');
})->name('admin.pengajar.index');

Route::get('/admin/kelas', function () {
    return view('admin.kelas.index');
})->name('admin.kelas.index');

Route::get('/admin/kelas/create', function () {
    return view('admin.kelas.create-kelas');
})->name('admin.kelas.create');

Route::get('/admin/kelas/edit', function () {
    return view('admin.kelas.edit');
})->name('admin.kelas.edit');

Route::get('/admin/modul', function () {
    return view('admin.modul.index');
})->name('admin.modul.index');

Route::get('/admin/quiz', function () {
    return view('admin.quiz.index');
})->name('admin.quiz.index');

Route::get('/admin/sertifikat', function () {
    return view('admin.sertifikat.index');
})->name('admin.sertifikat.index');

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

//tambahan
//rangkuman
Route::middleware(['auth'])->group(function () {
    Route::get('/rangkuman', [RangkumanController::class, 'index'])->name('rangkuman.index');
    Route::get('/rangkuman/create', [RangkumanController::class, 'create'])->name('rangkuman.create');
    Route::post('/rangkuman', [RangkumanController::class, 'store'])->name('rangkuman.store');
    Route::get('/rangkuman/{rangkuman}/edit', [RangkumanController::class, 'edit'])->name('rangkuman.edit');
    Route::put('/rangkuman/{rangkuman}', [RangkumanController::class, 'update'])->name('rangkuman.update');
    Route::delete('/rangkuman/{rangkuman}', [RangkumanController::class, 'destroy'])->name('rangkuman.destroy');
});
//basicsquoz
Route::get('/basic-quiz/{number}', [BasicQuizController::class, 'show'])->name('basic.quiz.show');
Route::post('/basic-quiz/{number}', [BasicQuizController::class, 'submit'])->name('basic.quiz.submit');

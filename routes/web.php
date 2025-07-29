<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarBelajarController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\BalasanDiskusiController;

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

/// Halaman setelah login berhasil DIA AKAN KE HOME
Route::get('/home'), function () {
$user = Auth::user(); // ambil user login
return view('home', compact('user'));
})->middleware('auth')->name('home');

Route::get('/home', function () {
 $user = Auth::user(); // ambil user login
return view('home', compact('user'));
})->middleware('auth')->name('home');


Route::get('/profile', function () {
    $user = Auth::user(); // ambil user login
    return view('my-profile', compact('user'));
})->middleware('auth')->name('profile');


// SEARCH
Route::get('/search-result', function(){
    return view('contest-search-result');
})->name('search-result');

// REKOMENDASI MATERI SEE ALL
///Route::get('/contest', function(){
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

Route::get('/pengajar/materi', [MateriController::class, 'index'])->name('pengajar.materi.index');
// Materi - form tambah materi
Route::get('/pengajar/materi/create', function () {
    return view('pengajar.materi.buat-materi-pengajar');
})->name('pengajar.materi.create');

Route::post('/pengajar/materi/create', [MateriController::class, 'store'])->name('pengajar.materi.store');

//  Materi - detail materi
Route::get('/pengajar/materi/{materi}', [MateriController::class, 'show'])->name('pengajar.materi.show');
//  Materi - edit materi
Route::get('/pengajar/materi/{materi}/edit', [MateriController::class, 'edit'])->name('pengajar.materi.edit');
//  Materi - update materi
Route::put('/pengajar/materi/{materi}', [MateriController::class, 'update'])->name('pengajar.materi.update');
//  Materi - hapus materi
Route::delete('/pengajar/materi/{materi}', [MateriController::class, 'destroy'])->name('pengajar.materi.destroy');


// Quiz - pengajar melihat dan mengelola quiz

Route::get('/pengajar/quiz', function () {
     return view('pengajar.quiz.index-quiz-pengajar');
})->name('pengajar.quiz.index');


//QUIZ - TAMBAH QUIZ DESKRIPSI
Route::get('/pengajar/quiz/create', function () {
    return view('pengajar.quiz.buat-quiz-pengajar');
})->name('pengajar.quiz.create');

//QUIZ - TAMBAH SOAL 
Route::get('/pengajar/soal/create', function () {
    return view('pengajar.quiz.buat-soal-pengajar');
})->name('pengajar.soal.create');
// siswa
Route::get('/materi', [MateriController::class, 'materi'])->name('materi');
Route::get('/materi/pengajar/{id}', [MateriController::class, 'showByPengajar'])->name('materi.showByPengajar');

//daftar belajar
Route::post('/daftar-belajar/simpan', [DaftarBelajarController::class, 'simpan'])
    ->middleware('auth')
    ->name('daftar-belajar.simpan');

//KELAS
Route::get('/belajar/materi-belum', [DaftarBelajarController::class, 'index'])->name('belajar.materi-belum');

Route::get('/kelas', [DaftarBelajarController::class, 'index'])->name('kelas');

// Forum - forum diskusi pengajar
Route::get('/pengajar/forum', function () {
    return view('pengajar.forum.forum-pengajar');
})->name('pengajar.forum.index');
// Forum untuk materi
Route::get('/pengajar/materi/{materi}/forum', [DiskusiController::class, 'index'])->name('forum.pengajar');

// Tambah diskusi
Route::post('/pengajar/materi/{materi}/diskusi', [DiskusiController::class, 'store'])->name('diskusi.store');

// Tambah balasan
Route::post('/pengajar/diskusi/{diskusi}/balasan', [BalasanDiskusiController::class, 'store'])->name('balasan.store');


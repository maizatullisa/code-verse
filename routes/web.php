<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/berhasil', function () {
    return view('berhasil'); 
})->name('berhasil');

/// Aksi kirim form register
Route::post('/register', [AuthController::class, 'register'])->name('register');

/// Aksi kirim form login
Route::post('/masuk', [AuthController::class, 'login'])->name('login');
/// Redirect jika akses GET ke /login

/// Halaman setelah login berhasil DIA AKAN KE HOME
// Route::get('/home'), function () {
//     $user = Auth::user(); // ambil user login
//     return view('home', compact('user'));
// })->middleware('auth')->name('home');

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

<?php

use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\AdminPengajarController;
use App\Http\Controllers\ForumSiswa;
use App\Http\Controllers\MateriBladeSearch;
use App\Http\Controllers\UserProfileController;
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
use App\Http\Controllers\PengajarDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriShowController;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\CourseEnrollmentController;

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

/*
|--------------------------------------------------------------------------
| AUT ROUTES
|--------------------------------------------------------------------------
*/

// Google Auth
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// Landing Page
Route::get('/landing-mobile', function(){
    return view('mobile.landing-mobile');
})->name('mobile.landing');

// LOGIN & REGISTER
Route::get('/masuk-mobile', function () {
    return view('mobile.auth.masuk');
})->name('mobile.auth.masuk');

Route::get('/register-mobile', function () {
    return view('mobile.auth.register'); 
})->name('mobile.auth.register');

Route::get('/berhasil', function () {
    return view('mobile.auth.berhasil'); 
})->name('mobile.auth.berhasil');

//USER PATH DUMMY 
Route::get('/user-mobile', function(){
    return view('mobile.user-mobile');
})->name('mobile.user-mobile');

// AUTH AKSI
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/masuk', [AuthController::class, 'login'])->name('login');

// PASSWORD RESET
Route::get('/pw', function () {
    return view('mobile.auth.lupa-pw');
})->name('mobile.auth.lupa-pw');

Route::get('/bikin-pw', function () {
    return view('mobile.auth.bikin-pw');
})->name('mobile.auth.bikin-pw');

Route::get('/otp', function () {
    return view('mobile.auth.veriv-otp');
})->name('mobile.auth.otp');

Route::get('/pw-baru', function () {
    return view('.mobile.auth.pw-baru-sukses');
})->name('mobile.auth.pw-baru');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

// ADMIN LOGIN
Route::get('/admin/login', function () {
    return view('admin.login-admin');
})->name('login-admin');

Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);
    Route::post('/resend-otp', [AuthController::class, 'resendOTP']);
    
    // Protected admin routes
    Route::middleware('jwt.admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        Route::post('/logout', [AuthController::class, 'logout']);
        // Route::get('/admin/login', [AuthController::class, 'login'])->name('login.admin');
    });
});

// ADM 
// ADM DASHBOARD
// ADMIN DASHBOARD USER
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/user/create', [AdminController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user', [AdminController::class, 'store'])->name('admin.users.store');

// ADMIN USER DASHBBOARD MANAGEMEN
Route::get('/admin/user', [AdminUserController::class, 'index'])->name('admin.user.index');
Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
Route::get('/admin/user/show', function () {
    return view('admin.user.show');
})->name('admin.user.show');

//rute kelas admin dashboard
Route::get('/admin/kelas', [AdminKelasController::class, 'index'])->name('admin.kelas.index');


// ADMIN PENGAJAR DASHBBOARD MANAGEMEN
Route::get('/admin/pengajar', [AdminPengajarController::class, 'index'])->name('admin.pengajar.index');
Route::get('admin/pengajar/{user}/edit', [AdminPengajarController::class, 'edit'])->name('admin.pengajar.edit');
Route::put('/admin/pengajar/{user}', [AdminPengajarController::class, 'update'])->name('admin.pengajar.update');
Route::delete('/admin/pengajar/{user}', [AdminPengajarController::class, 'destroy'])->name('admin.pengajar.destroy');

// ADMIN ROADMAP
Route::get('/admin/roadmap', function () {
    return view('admin.roadmap.roadmap-adm');
})->name('admin.roadmap.roadmap-adm');

/*
|--------------------------------------------------------------------------
| MOBILE USER ROUTES
|--------------------------------------------------------------------------
*/

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
//google auth 
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
//PERTAMA
Route::get('/landing-mobile', function(){
    return view(view:'landing');
})->name(name:'landing');


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


/// Aksi kirim form register
Route::post('/register', [AuthController::class, 'register'])->name('register');

// /// Aksi kirim form login
// /// Halaman awal: login
// Route::get('/masuk-mobile', function () {
//     return view('masuk');
// })->name('masuk');
// Route::post('/masuk-mobile', [AuthController::class, 'login'])->name('login');


/// Redirect jika akses GET ke /login

/// Halaman setelah login berhasil DIA AKAN KE HOME INI AKU COMM DULU YA 
// Route::get('home-mobile', [MateriBladeSearch::class, 'index'])->name('home');
// Route::get('/home-mobile', function () {
// $user = Auth::user(); // ambil user login
// return view('mobile.home.mobile', compact('user'));
// })->middleware('auth')->name('home-mobile');

// DICOMMENT SAMA OYIN
// Route::get('/home', function () {
//  $user = Auth::user(); // ambil user login
// return view('mobile.home-mobile', compact('user'));
// })->middleware('auth')->name('home');

Route::get('/profile', function () {
    $user = Auth::user(); // ambil user login
    return view('mobile.user-mobile', compact('user'));
})->middleware('auth')->name('profile');


// ROUTE DUMMY 
 Route::get('/home-mobile', function(){
     return view('mobile.home-mobile');
 })->name('home-mobile');


// SEARCH
// Route::get('/search-result', function(){
//     return view('contest-search-result');
// })->name('search-result');

// HOME
Route::get('/home-mobile', function(){
    return view('mobile.home-mobile');
})->name('mobile.home-mobile');

// CARI
Route::get('/search-result', function(){
    return view('contest-search-result');
})->name('search-result');

// PAGES KONTEN
Route::get('/pengajar', function(){
    return view('pengajar');
})->name('pengajar');

// Route::get('/materi', function(){
//     return view('materi');
// })->name('materi');

// ROUTE NAVBAR SAMPING KIRI (KOMPONEN DAN KAWAN KAWANNYA)
// PENGATURAN START
// PENGATURAN
Route::get('/settings', function(){
    return view('settings');
})->name('settings');

Route::get('/details', function(){
    return view('verify-details');
})->name('details');

Route::get('/notification', function(){
    return view('notification-setting');
})->name('notification');

//NAVBAR BAWAH
Route::get('/box', function (){
    return view(view:'chat-box');
})->name(name:'box');
//LIBRARY
Route::get('/library', function(){
    return view(view:'library');
})->name(name:'library');
// Navigation Pages
Route::get('/help-mobile', function (){
    return view('mobile.help-ai-mobile');
})->name('mobile.help-ai-mobile');

Route::get('/roadmap-mobile', function(){
    return view('mobile.roadmap.index-roadmap-mobile');
})->name('mobile.roadmap.index-roadmap-mobile');

Route::get('/detail-roadmap-mobile', function(){
    return view('mobile.roadmap.detail-roadmap-mobile');
})->name('mobile.roadmap.detail-roadmap-mobile');

/*
|--------------------------------------------------------------------------
| QUIZ ROUTES (MOBILE)
|--------------------------------------------------------------------------
*/

Route::get('/detail', function(){
    return view('quiz-details');
})->name('/detail');

// Quiz Pages
Route::get('/quiz-1', function(){
    return view('dasar-quiz-1');
})->name('/quiz-1');

Route::get('/quiz-2', function(){
    return view('dasar-quiz-2');
})->name('/quiz-2');

Route::get('/quiz-3', function(){
    return view('dasar-quiz-3');
})->name('/quiz-3');

Route::get('/quiz-4', function(){
    return view('dasar-quiz-4');
})->name('/quiz-4');

Route::get('/quiz-5', function(){
    return view('dasar-quiz-5');
})->name('/quiz-4');

//rute pengajar
//forumdiskusi 
// DASHBOARD PENGAJAR
Route::get('/pengajar/dashboard', [PengajarDashboardController::class, 'index'])->name('pengajar.dashboard');

// Basic Quiz (Controller-based)
// Route::get('/basic-quiz/{number}', [BasicQuizController::class, 'show'])->name('basic.quiz.show');
// Route::post('/basic-quiz/{number}', [BasicQuizController::class, 'submit'])->name('basic.quiz.submit');

/*
|--------------------------------------------------------------------------
| PENGAJAR ROUTES
|--------------------------------------------------------------------------
*/

// Pengajar Dashboard
// Route::get('/pengajar/dashboard', function () {
//     return view('pengajar.dashboard_pengajar');
// })->name('pengajar.dashboard_pengajar');

// Pengajar Kelas Management
Route::get('/pengajar/buat-kelas', function () {
    return view('pengajar.materi.buat-kelas');
})->name('pengajar.materi.buat-kelas');

// Route::get('/pengajar/index-kelas-pengajar', action: function () {
//     return view('pengajar.materi.index-kelas-pengajar');
// })->name('pengajar.materi.index-kelas-pengajar');

// Dashboard Kelas
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

// Materi - list semua materi pengajar
// Route::get('/pengajar/materi', function () {
//     return view('pengajar.materi.index-materi-pengajar');
// })->name('pengajar.materi.index');
Route::get('/pengajar/kelas/{kelasId}/materi', [MateriController::class, 'index'])
    ->name('pengajar.materi.index');


// Materi - form tambah materi
// Route::get('/pengajar/materi/create', function () {
//     return view('pengajar.materi.buat-materi-pengajar');
// })->name('pengajar.materi.create');
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
 

// Quiz - pengajar melihat dan mengelola quiz

// Route::get('/pengajar/quiz', function () {
// return view('pengajar.quiz.index-quiz-pengajar');
// })->name('pengajar.quiz.index');

// Pengajar Materi Management
Route::get('/pengajar/materi', function () {
    return view('pengajar.materi.index-materi-pengajar');
})->name('pengajar.materi.index');

// Pengajar Quiz Management
Route::get('/pengajar/quiz', [QuizController::class, 'listQuiz'])->name('pengajar.quiz.listquiz');
Route::get('/pengajar/quiz/{materi}', [QuizController::class, 'create'])->name('pengajar.quiz.create');
Route::get('/pengajar/quiz/question/create/{quiz_id}',[QuizController::class,'createQuizQuestion'])->name('pengajar.quiz.question.create');
Route::post('/pengajar/quiz/question/store',[QuizController::class,'storeQuestion'])->name('pengajar.quiz.question.store');

Route::get('/pengajar/soal/create', function () {
    return view('pengajar.quiz.buat-soal-pengajar');
})->name('pengajar.soal.create');

// Routes untuk public (siswa/umum)
Route::get('/materi', [MateriShowController::class, 'index'])->name('materi');
Route::get('/materi/pengajar/{id}', [MateriShowController::class, 'showByPengajar'])->name('materi.showByPengajar');
Route::get('/materi/kelas/{id}', [MateriShowController::class, 'showByKelas'])->name('materi.showByKelas'); 



// Routes untuk daftar belajar (perlu authentication)
Route::middleware('auth')->group(function () {
    Route::post('/daftar-belajar/simpan', [DaftarBelajarController::class, 'simpan'])->name('daftar-belajar.simpan');
    Route::get('/daftar-belajar', [DaftarBelajarController::class, 'index'])->name('daftar-belajar.index');
    Route::get('/kelas-saya', [DaftarBelajarController::class, 'kelasSaya'])->name('daftar-belajar.kelas-saya');
    Route::get('/pembelajaran/{kelas}', [DaftarBelajarController::class, 'pembelajaran'])->name('daftar-belajar.pembelajaran');
    Route::post('/daftar-belajar/update-progress/{materi}', [DaftarBelajarController::class, 'updateProgress'])->name('daftar-belajar.update-progress');
    Route::get('/pembelajaran/{kelasId}/materi/{materiId}', [DaftarBelajarController::class, 'viewMateri'])->name('pembelajaran.view-materi');
});
Route::get('/kelas', [DaftarBelajarController::class, 'index'])->name('kelas');
Route::get('/pengajar/quiz/soal/create', function () {
    return view('pengajar.quiz.buat-soal-quiz-pengajar');
})->name('pengajar.quiz.soal.create');

// Pengajar Forum Management
Route::get('/pengajar/forum/{kelas}', [DiskusiController::class, 'materiDiskusi'])->name('pengajar.forum.show');
Route::get('/pengajar/kelas/{kelas}/forum', [DiskusiController::class, 'index'])->name('forum.pengajar');
Route::post('/pengajar/kelas/{kelas}/diskusi', [DiskusiController::class, 'store'])->name('diskusi.store');
Route::post('/pengajar/diskusi/{diskusi}/balasan', [BalasanDiskusiController::class, 'store'])->name('balasan.store');
Route::get('/pengajar/forum/like/{diskusi}', [DiskusiController::class, 'diskusiSuka'])->name('forum.diskusi.like');

/*
|--------------------------------------------------------------------------
| STUDENT LEARNING ROUTES
|--------------------------------------------------------------------------
*/

// Materi
// Route::get('/materi', [MateriController::class, 'materi'])->name('materi');
// Route::get('/materi/pengajar/{id}', [MateriController::class, 'showByPengajar'])->name('materi.showByPengajar');
// //basicsquoz
// Route::get('/basic-quiz/{number}', [BasicQuizController::class, 'show'])->name('basic.quiz.show');
// Route::post('/basic-quiz/{number}', [BasicQuizController::class, 'submit'])->name('basic.quiz.submit');
// Kelas & Learning
Route::get('/belajar/materi-belum', [DaftarBelajarController::class, 'index'])->name('belajar.materi-belum');
Route::get('/kelas', [DaftarBelajarController::class, 'index'])->name('kelas');

/*
|--------------------------------------------------------------------------
| DESKTOP ROUTES
|--------------------------------------------------------------------------
*/

// LANDING
Route::get('/desktop/landing-desktop', function () {
    return view('desktop.landing-desktop');
})->name('desktop.landing-desktop');

Route::get('/desktop/lorek-desktop', function () {
    return view('desktop.lorek-desktop');
 })->name('desktop.lorek-desktop');

 Route::get('/desktop/user-desktop', function () {
    return view('desktop.user-desktop');
 })->name('desktop.user-desktop');

 Route::get('desktop/user-desktop', [UserProfileController::class, 'dashboardUserDesktop'])->name('user.desktop');

Route::get('/desktop/home-desktop', function () {
    return view('desktop.dashboard-user-desktop');
 })->name('desktop.dashboard-user-desktop');


// Desktop Materi
Route::get('/desktop/rekomendasi-materi', function () {
    return view('desktop.pages.materi.rekomendasi-materi');
 })->name('desktop.pages.materi.rekomendasi-materi');

Route::get('/desktop/belajar-materi', function () {
    return view('desktop.pages.materi.belajar-materi');
 })->name('desktop.pages.materi.belajar-materi');

// Desktop Kelas
Route::get('/desktop/kelas-index', function () {
    return view('desktop.pages.kelas.kelas-index');
 })->name('desktop.pages.kelas.kelas-index');

 //kelasditawarkan
// Route::get('/desktop/kelas-ditawarkan', function () {
//     return view('desktop.pages.kelas.kelas-ditawarkan');
//  })->name('desktop.pages.kelas.kelas-ditawarkan');

Route::get('/desktop/kelas-ditawarkan', [MateriShowController::class, 'tampil'])->name('kelas.ditawarkan');
// Route::get('/materi/pengajar/{id}', [MateriShowController::class, 'showByPengajar'])->name('materi.showByPengajar');
// Route::get('/materi/kelas/{id}', [MateriShowController::class, 'showByKelas'])->name('materi.showByKelas'); 

 Route::get('/desktop/kelas-previews', function () {
    return view('desktop.pages.kelas.kelas-previews');
 })->name('desktop.pages.kelas.kelas-previews');

Route::get('/desktop/kelas-diambil', function () {
    return view('desktop.pages.kelas.kelas-diambil');
 })->name('desktop.pages.kelas.kelas-diambil');

//  Route::('/desktop/kelas-diambil',[CourseEnrollmentController::class, 'index'])->name('desktop.pages.kelas.kelas-diambil');

Route::get('/desktop/kelas-selesai', function () {
    return view('desktop.pages.kelas.kelas-selesai');
 })->name('desktop.pages.kelas.kelas-selesai');

Route::get('/desktop/kelas-detail', function () {
    return view('desktop.pages.kelas.kelas-detail');
 })->name('desktop.pages.kelas.kelas-detail');

//  Route::post('/desktop/kelas-detail', [CourseEnrollmentController::class, 'index'])->name('kelas.detail');

// Route::get('/desktop/kelas-pendaftaran', function () {
//     return view('desktop.pages.kelas.kelas-pendaftaran');
//  })->name('desktop.pages.kelas.kelas-pendaftaran');

Route::get('/desktop/kelas-materi', function () {
    return view('desktop.pages.kelas.kelas-materi');
 })->name('desktop.pages.kelas.kelas-materi');

Route::get('/desktop/pages/kelas/kelas-quiz', function () {
    return view('desktop.pages.kelas.kelas-quiz');
 })->name('desktop.pages.kelas.kelas-quiz');


 // DESKTOP FORM SERTIFIKAT
 Route::get('/desktop/form-sertifikat', function () {
    return view('desktop.pages.sertifikat.form-sertif');
 })->name('desktop.pages.sertifikat.form-sertif');

 //DESKTOP INDEX SERTTIF
  Route::get('/desktop/sertifikat', function () {
    return view('desktop.pages.sertifikat.index-sertif');
 })->name('desktop.pages.sertifikat.index-sertif');

// Desktop Forum
// Route::get('/desktop/forum-siswa', function () {
//     return view('desktop.pages.forum.forum-siswa');
//  })->name('desktop.pages.forum.forum-siswa');

// Contoh route di web.php
Route::get('/desktop/forum-siswa/{kelasId}', [ForumSiswa::class, 'forumSiswa'])->name('forum.siswa');
Route::get('/forum/{kelas}', [ForumSiswa::class, 'index'])
    ->name('desktop.pages.forum.forum-siswa');
Route::post('/desktop/kelas/{kelas}/diskusi', [ForumSiswa::class, 'store'])->name('forum.siswa.store');
Route::post('/desktop/diskusi/{diskusi}/balasan', [ForumSiswa::class, 'siswaDiskusi'])->name('forum.siswa.balas');
Route::get('/desktop/forum/like/{diskusi}', [ForumSiswa::class, 'diskusiSuka'])->name('forum.siswa.like');
Route::post('/desktop/diskusi/{diskusi}/balasan', [ForumSiswa::class, 'siswaBalasan'])->name('forum.siswa.balas');
    

// Desktop Help AI
Route::get('/desktop/help-ai', function () {
    return view('desktop.help-ai');
 })->name('desktop.help-ai');


// Desktop Roadmap
Route::get('/desktop/index-roadmap', function () {
    return view('desktop.roadmap.index-roadmap-user');
 })->name('desktop.roadmap.index-roadmap-user');

Route::get('/desktop/detail-kosong', function () {
    return view('desktop.roadmap.detail-roadmap-kosong');
 })->name('desktop.roadmap.detail-roadmap-kosong');

Route::get('/desktop/detail-desktop', function () {
    return view('desktop.roadmap.detail-roadmap');
 })->name('esktop.roadmap.detail-roadmap');

/*
|--------------------------------------------------------------------------
| GAMES ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/games/pilih-game', function () {
    return view('games.pilih-game');
 })->name('games.pilih-game');

Route::get('/games/bird', function () {
    return view('games.bird');
 })->name('games.bird');

Route::get('/games/syntaxLab', function () {
    return view('games.syntaxLab');
 })->name('games.syntaxLab');

Route::get('/games/glitchmaze', function () {
    return view('games.glitchmaze');
 })->name('games.glitchmaze');

Route::get('/games/syntaxShowdown', function () {
    return view('games.syntaxShowdown');
 })->name('games.syntaxShowdown');


 // COBA JELAJAHI
Route::get('/glossary', function (){
    return view('desktop.jelajahi.glosarry');
})->name('desktop.jelajahi.glosarry');

Route::get('/keyboard-shortcuts', function(){
    return view('desktop.jelajahi.keyboard-shourcut');
})->name('desktop.jelajahi.keyboard-shourcut');

Route::get('/coding-tips', function(){
    return view('desktop.jelajahi.coding-tips');
})->name('desktop.jelajahi.coding-tips');



/*
|--------------------------------------------------------------------------
| API ROUTES
|--------------------------------------------------------------------------
*/

// Gemini AI
Route::post('/gemini/ask', [GeminiController::class, 'ask']);

/*
|--------------------------------------------------------------------------
| COMMENTED ROUTES (For Future Use)
|--------------------------------------------------------------------------
*/

// Commented routes yang mungkin akan digunakan nanti:
// Route::get('/home-mobile', function () {
//     $user = Auth::user();
//     return view('mobile.home-mobile', compact('user'));
// })->middleware('auth')->name('home-mobile');

// Route::get('/user-mobile', function () {
//     $user = Auth::user();
//     return view('mobile.user-mobile', compact('user'));
// })->middleware('auth')->name('user-mobile');

// Route::post('/daftar-belajar/simpan', [DaftarBelajarController::class, 'simpan'])
//     ->middleware('auth')
//     ->name('daftar-belajar.simpan');
    

// Pendaftaran
Route::get('/kelas/{kelas}/pendaftaran', [CourseEnrollmentController::class, 'create'])->name('desktop.pages.kelas.kelas-pendaftaran');

Route::post('/kelas/{kelas}/pendaftaran', [CourseEnrollmentController::class, 'store'])
    ->name('enrollments.store');



// Route::post('/kelas/{kelas}/pendaftaran', [CourseEnrollmentController::class, 'store'])
//     ->name('desktop.pages.kelas.kelas-pendaftaran.store');



// List kelas yang diambil
Route::get('/kelas-diambil', [CourseEnrollmentController::class, 'index'])
    ->name('desktop.pages.kelas.kelas-diambil');
// New routes for course enrollment
// Route::get('/desktop/kelas-pendaftaran', function () {
//     return view('desktop.pages.kelas.kelas-pendaftaran');
//  })->name('desktop.pages.kelas.kelas-pendaftaran');



<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\Materi;
use App\Models\Kelas;
use App\Models\Diskusi;
use App\Models\QuizQuestion;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;

class PengajarDashboardController extends Controller
{

public function index()
{
    $pengajarId = auth()->id();

    $totalKelas = Kelas::where('pengajar_id', $pengajarId)->count();
    $totalDiskusi = Diskusi::where('pengajar_id', $pengajarId)->count(); // asumsi pengajar_id di diskusi
    $totalQuiz = Quiz::whereHas('materi', function ($q) use ($pengajarId) {
        $q->where('pengajar_id', $pengajarId);
    })->count();

    $totalSoal = QuizQuestion::whereHas('quiz.materi', function ($q) use ($pengajarId) {
        $q->where('pengajar_id', $pengajarId);
    })->count();


    $totalSiswa = CourseEnrollment::whereHas('kelas', function ($q) use ($pengajarId) {
        $q->where('pengajar_id', $pengajarId);
    })->whereIn('status', ['approved', 'pending'])->count();

    $data = [
        'totalKelas' => $totalKelas,
        'totalDiskusi' => $totalDiskusi,
        'total_quiz' => $totalQuiz,
        'totalSoal' => $totalSoal,
        'totalSiswa' => $totalSiswa
    ];

    return view('pengajar.dashboard_pengajar', $data);
}

}

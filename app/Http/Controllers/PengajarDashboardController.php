<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\Materi;
use App\Models\Diskusi;
use Illuminate\Http\Request;

class PengajarDashboardController extends Controller
{
  
// public function index()
// {
//     $pengajarId = auth()->id();
//     $materiId = auth()->id();
    
//     $data = [
//         'totalMateri' => Materi::where('pengajar_id', $pengajarId)->count(),
//         // Ganti 'user_id' dengan nama kolom yang sebenarnya ada di tabel diskusi
//         'totalDiskusi' => Diskusi::where('user_id', $pengajarId)->count(),
//         // Atau jika menggunakan kolom lain:
//         // 'totalDiskusi' => Diskusi::where('created_by', $pengajarId)->count(),
//         // 'total_quiz'      => Quiz::where('pengajar_id', $pengajarId)->count(),
        

//     ];
    
//     return view('pengajar.dashboard_pengajar', $data);
// }

public function index()
{
    $pengajarId = auth()->id();

    $totalMateri = Materi::where('pengajar_id', $pengajarId)->count();
    $totalDiskusi = Diskusi::where('pengajar_id', $pengajarId)->count(); // asumsi pengajar_id di diskusi
    $totalQuiz = Quiz::whereHas('materi', function ($q) use ($pengajarId) {
        $q->where('pengajar_id', $pengajarId);
    })->count();

    $data = [
        'totalMateri' => $totalMateri,
        'totalDiskusi' => $totalDiskusi,
        'total_quiz' => $totalQuiz,
    ];

    return view('pengajar.dashboard_pengajar', $data);
}



}

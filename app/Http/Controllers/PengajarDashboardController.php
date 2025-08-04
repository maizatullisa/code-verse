<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use App\Models\Materi;
use App\Models\Diskusi;
use Illuminate\Http\Request;

class PengajarDashboardController extends Controller
{
  
public function index()
{
    $pengajarId = auth()->id();
    $materiId = auth()->id();
    
    $data = [
        'totalMateri' => Materi::where('pengajar_id', $pengajarId)->count(),
        // Ganti 'user_id' dengan nama kolom yang sebenarnya ada di tabel diskusi
        'totalDiskusi' => Diskusi::where('user_id', $pengajarId)->count(),
        // Atau jika menggunakan kolom lain:
        // 'totalDiskusi' => Diskusi::where('created_by', $pengajarId)->count(),
        'total_quiz'      => Quiz::where('materi_id', $materiId)->count(),

    ];
    
    return view('pengajar.dashboard_pengajar', $data);
}


}

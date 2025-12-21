<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Http\Request;

class AdminLihatKelasController extends Controller
{
    public function index($kelasId)
    {
        $kelas = Kelas::with(['pengajar', 'siswa'])->findOrFail($kelasId);

        // Ambil semua materi
        $materis = Materi::where('kelas_id', $kelasId)
                        ->orderBy('created_at', 'asc')
                        ->get();

        $totalMateri = $materis->count();
        $totalQuiz = $materis->filter(fn($m) => $m->quiz !== null)->count();
        $totalItems = $totalMateri + $totalQuiz;

        return view('admin.kelas.lihat-kelas', compact(
            'kelas',
            'materis',
            'totalMateri',
            'totalQuiz',
            'totalItems'
        ));
    }
}

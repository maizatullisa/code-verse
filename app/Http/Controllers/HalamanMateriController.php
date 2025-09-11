<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Materi;

class HalamanMateriController extends Controller
{

   public function index($materiId)
    {
        
        
        $materi = Materi::with('kelas', 'pengajar')->findOrFail($materiId);

        // Cek apakah pengajar adalah pemilik materi ini
        if ($materi->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke materi ini.');
        }

         $kelas = $materi->kelas;

        return view('pengajar.materi.halaman-materi', compact('materi'));
    
    }

}

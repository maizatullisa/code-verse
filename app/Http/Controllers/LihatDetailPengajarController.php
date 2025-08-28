<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfilePengajar;
use Illuminate\Http\Request;

class LihatDetailPengajarController extends Controller
{
     /**
     * Tampilkan biodata pengajar untuk siswa.
     */

     public function index()
    {
        // Ambil semua pengajar
        $teachers = ProfilePengajar::with('user', 'riwayatPendidikan')->get();
        return view('desktop.dashboard-user-desktop', compact('teachers'));
    }

    public function show($pengajarId)
    {
        // Ambil profil berdasarkan user_id
          $profile = ProfilePengajar::with('riwayatPendidikan')
                    ->where('user_id', $pengajarId)
                    ->firstOrFail();

        // Optional: ambil data user/pengajar lain jika perlu
        $pengajar = $profile->user; // otomatis relasi ke User

        return view('desktop.dashboard-user-desktop', compact('profile', 'pengajar'));
    }

}

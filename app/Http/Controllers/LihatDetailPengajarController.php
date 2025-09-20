<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfilePengajar;
use Illuminate\Http\Request;

class LihatDetailPengajarController extends Controller
{
     public function index()
    {
        $teachers = ProfilePengajar::with('user', 'riwayatPendidikan')->get();
        return view('desktop.dashboard-user-desktop', compact('teachers'));
    }

    public function show($pengajarId)
    {
     
          $profile = ProfilePengajar::with('riwayatPendidikan')
                    ->where('user_id', $pengajarId)
                    ->firstOrFail();

        $pengajar = $profile->user; 

        return view('desktop.dashboard-user-desktop', compact('profile', 'pengajar'));
    }

}

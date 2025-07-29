<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index()
    {
   $user = Auth::user();
   $totalMateri = $user->materis()->count();

   return view('pengajar.dashboard_pengajar', [
    'totalMateri' => $totalMateri,
   ]);
    }
}

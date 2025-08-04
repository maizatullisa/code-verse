<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Materi;
use Illuminate\Http\Request;

class AdminKelasController extends Controller
{
   public function index()
   {
    $users = User::all();
    $totalSiswa = User::where('role', 'siswa')->count();
    $totalPengajar = User::where('role', 'pengajar')->count();
    $totalMateri = Materi::count();
    return view('admin.kelas.index', compact('users', 'totalSiswa', 'totalPengajar', 'totalMateri'));
   }  

   public function create()
   {
      
   }

   
}

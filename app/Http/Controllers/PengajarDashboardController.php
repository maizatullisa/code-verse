<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Diskusi;
use Illuminate\Http\Request;

class PengajarDashboardController extends Controller
{
    public function index()
    {
        $data = [
        'totalMateri' => Materi::count(),
        'totalDiskusi' => Diskusi::count(),
        ];
        return view('pengajar.dashboard_pengajar', $data);
    }
}

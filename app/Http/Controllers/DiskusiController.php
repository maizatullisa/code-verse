<?php

namespace App\Http\Controllers;

use App\Models\DiskusiSuka;
use App\Models\Diskusi;
use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiController extends Controller
{
    
    public function index(Request $request, $kelasId)
{
    $filter = $request->query('filter');

    $kelas = Kelas::findOrFail($kelasId);

    $diskusiQuery = Diskusi::with(['user', 'balasan.user', 'diskusiSukas'])
        ->where('kelas_id', $kelasId);

    if ($filter === 'terbaru') {
        $diskusiQuery->orderBy('created_at', 'desc');
    } elseif ($filter === 'populer') {
        $diskusiQuery->withCount('diskusiSukas')->orderBy('diskusi_sukas_count', 'desc');
    } elseif ($filter === 'belum_dijawab') {
        $diskusiQuery->doesntHave('balasan');
    } else {
        $diskusiQuery->latest();
    }

    $diskusi = $diskusiQuery->paginate(5)->withQueryString();

    return view('pengajar.forum.forum-pengajar', [
        'kelas' => $kelas,
        'diskusi' => $diskusi,
        'filter' => $filter,
    ]);
}


    public function store(Request $request, $kelasId)
    {
        $kelas = Kelas::findOrFail($kelasId);
        $pengajarId = $kelas->pengajar_id;

        $request->validate([
            'konten' => 'required|string'
        ]);
    

        Diskusi::create([
            'kelas_id' => $kelasId,
            'user_id' => Auth::id(),
            'konten' => $request->konten,
            'pengajar_id' => $pengajarId
        ]);

        return redirect()->back()->with('success', 'Diskusi berhasil ditambahkan.');
    }

    public function materiDiskusi($kelasId)
    {
        
        $kelas = Kelas::with('diskusi.user', 'diskusi.balasan.user')->findOrFail($kelasId);
        return view('pengajar.forum.forum-pengajar', compact('kelas'));
    }
    
    public function diskusiSuka($diskusiId)
    {
        DiskusiSuka::firstOrCreate([
                'diskusi_id' => $diskusiId,
                'user_id'   => Auth::user()->id
            ]);
        
        return redirect()->back()->with('success', 'postingan berhasil di like.');
    }
}


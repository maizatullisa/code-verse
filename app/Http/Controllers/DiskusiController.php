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
    
    public function index($kelasId)
    {
        
        $kelas = Kelas::with('diskusi.user', 'diskusi.balasan.user')->findOrFail($kelasId);
        return view('pengajar.forum.forum-pengajar', compact('kelas'));
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


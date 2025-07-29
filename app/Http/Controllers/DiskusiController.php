<?php

namespace App\Http\Controllers;

use App\Models\Diskusi;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiController extends Controller
{
    
    public function index($materiId)
    {
        $materi = Materi::with('diskusi.user', 'diskusi.balasan.user')->findOrFail($materiId);
        return view('pengajar.forum-pengajar', compact('materi'));
    }

    public function store(Request $request, $materiId)
    {
        $request->validate([
            'konten' => 'required|string'
        ]);

        Diskusi::create([
            'materi_id' => $materiId,
            'user_id' => Auth::id(),
            'konten' => $request->konten
        ]);

        return redirect()->back()->with('success', 'Diskusi berhasil ditambahkan.');
    }

    
}

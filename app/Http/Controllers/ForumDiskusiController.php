<?php

namespace App\Http\Controllers;

use App\Models\ForumDiskusi;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumDiskusiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'pesan' => 'required|string',
        ]);

        ForumDiskusi::create([
            'materi_id' => $request->materi_id,
            'user_id' => Auth::id(),
            'pesan' => $request->pesan,
        ]);

        return back()->with('success', 'Pesan berhasil dikirim');
    }
}
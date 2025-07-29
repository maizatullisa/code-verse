<?php

namespace App\Http\Controllers;

use App\Models\BalasanDiskusi;
use App\Models\Diskusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalasanDiskusiController extends Controller
{
    public function store(Request $request, $diskusiId)
    {
        $request->validate([
            'konten' => 'required|string'
        ]);

        BalasanDiskusi::create([
            'diskusi_id' => $diskusiId,
            'user_id' => Auth::id(),
            'konten' => $request->konten
        ]);

        return redirect()->back()->with('success', 'Balasan berhasil ditambahkan.');
    }
}

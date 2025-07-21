<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    //  Tampilkan semua materi
    public function index()
    {
        $materis = Materi::latest()->get();
        return view('materi', compact('materis')); //ganti dari file blade ('materi') sesuaikan file blade
    }

    // Tampilkan detail satu materi
    public function show($id)
    {
        $materi = Materi::findOrFail($id);
        return view('materi', compact('materi'));
    }

    // Tambah materi (untuk pengajar)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'video_url' => 'nullable|string',
        ]);

        $materi = Materi::create($validated);
        return redirect()->back()->with('success', 'Materi berhasil ditambahkan');
    }

    // Update materi
    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'video_url' => 'nullable|string',
        ]);

        $materi->update($validated);

        return response()->json([
            'message' => 'Materi berhasil diperbarui',
            'data' => $materi
        ]);
    }

    //Hapus materi
    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return response()->json([
            'message' => 'Materi berhasil dihapus'
        ]);
    }
}

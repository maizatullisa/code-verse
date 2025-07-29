<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class MateriController extends Controller
{
    public function index()
    {
        // Ambil semua materi berdasarkan pengajar yang login
        $materis = Materi::where('pengajar_id', Auth::id())
                        ->orderBy('created_at', 'desc')
                        ->get();
        
         $jumlahMateri = $materis->count();
        
        return view('pengajar.materi.index-materi-pengajar', compact('materis', 'jumlahMateri'));
    }

    public function create()
    {
        return view('pengajar.materi.create-materi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'required|string',
            'level' => 'nullable|in:beginner,intermediate,advanced',
            'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,mp4,avi,mkv|max:51200', // 50MB
            'rangkuman' => 'nullable|string',
            'status' => 'required|in:draft,published'
        ]);

        $filePath = null;
        $fileName = null;
        $fileSize = null;

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('materis', $fileName, 'public');
            $fileSize = $file->getSize();
        }

        // Determine status based on button clicked
        $status = $request->input('action') === 'save_draft' ? 'draft' : 'published';
        if ($request->filled('status')) {
            $status = $request->status;
        }

        $materi = Materi::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'level' => $request->level,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => $fileSize,
            'rangkuman' => $request->rangkuman,
            'status' => $status,
            'pengajar_id' => Auth::id(),
        ]);

        $message = $status === 'draft' ? 'Materi berhasil disimpan sebagai draft!' : 'Materi berhasil dipublikasikan!';
        
        return redirect()->route('pengajar.materi.index')
                        ->with('success', $message);
    }

    public function show(Materi $materi)
    {
        // Pastikan hanya pengajar yang membuat materi yang bisa melihat
        if ($materi->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke materi ini.');
        }

        return view('pengajar.materi.show', compact('materi'));
    }

    public function edit(Materi $materi)
    {
        // Pastikan hanya pengajar yang membuat materi yang bisa edit
        if ($materi->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit materi ini.');
        }

        return view('pengajar.materi.edit', compact('materi'));
    }

    public function update(Request $request, Materi $materi)
    {
        // Pastikan hanya pengajar yang membuat materi yang bisa update
        if ($materi->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengupdate materi ini.');
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'required|string',
            'level' => 'nullable|in:beginner,intermediate,advanced',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,mp4,avi,mkv|max:51200', // 50MB
            'rangkuman' => 'nullable|string',
            'status' => 'required|in:draft,published'
        ]);

        $updateData = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'level' => $request->level,
            'rangkuman' => $request->rangkuman,
            'status' => $request->status
        ];

        // Handle file upload jika ada file baru
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($materi->file_path && Storage::disk('public')->exists($materi->file_path)) {
                Storage::disk('public')->delete($materi->file_path);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('materis', $fileName, 'public');
            $fileSize = $file->getSize();

            $updateData['file_path'] = $filePath;
            $updateData['file_name'] = $fileName;
            $updateData['file_size'] = $fileSize;
        }

        $materi->update($updateData);

        return redirect()->route('pengajar.materi.index')
                        ->with('success', 'Materi berhasil diperbarui!');
    }

    public function destroy(Materi $materi)
    {
        // Pastikan hanya pengajar yang membuat materi yang bisa hapus
        if ($materi->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus materi ini.');
        }

        // Hapus file jika ada
        if ($materi->file_path && Storage::disk('public')->exists($materi->file_path)) {
            Storage::disk('public')->delete($materi->file_path);
        }

        $materi->delete();

        return redirect()->route('pengajar.materi.index')
                        ->with('success', 'Materi berhasil dihapus!');
    }

    //materi.blade
    public function materi()
{
    // Ambil semua pengajar yang memiliki materi
    $pengajars = User::where('role', 'pengajar')
        ->whereHas('materis')
        ->with(['materis' => function ($query) {
            $query->latest();
        }])
        ->withCount('materis')
        ->get();

            return view('materi', compact('pengajars'));
        }
            public function showByPengajar($id)
        {
            $pengajar = User::with(['materis' => function ($q) {
                $q->orderBy('created_at', 'desc');
            }])->findOrFail($id);

            return view('detail', compact('pengajar'));
        }

    

}

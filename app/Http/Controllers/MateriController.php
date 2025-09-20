<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function index($kelasId)
    {
        $kelas = Kelas::findOrFail($kelasId);

        $materis = Materi::where('kelas_id', $kelasId)
            ->whereHas('kelas', function ($query) {
                $query->where('pengajar_id', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $jumlahMateri = $materis->count();

        return view('pengajar.materi.index-materi-pengajar', compact('materis', 'jumlahMateri', 'kelas'));
    }

    public function create($kelasId = null)
    {
        $kelas = null;
        $allKelas = Kelas::where('pengajar_id', Auth::id())->get();

        if ($kelasId) {
            $kelas = Kelas::findOrFail($kelasId);
            if ($kelas->pengajar_id !== Auth::id()) {
                abort(403, 'Anda tidak memiliki akses ke kelas ini.');
            }
        }

        return view('pengajar.materi.buat-materi-pengajar', compact('kelas', 'allKelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'required|string',
            'level' => 'nullable|in:beginner,intermediate,advanced',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,mp4,avi,mkv|max:51200', // 50MB
            'video_url' => 'nullable|url', 
            'rangkuman' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'kelas_id' => 'nullable|exists:kelas,id'
        ]);

        $filePath = null;
        $fileName = null;
        $fileSize = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('materis', $fileName, 'public');
            $fileSize = $file->getSize();
        }

        $video_url = $request->video_url;
        if ($video_url && str_contains($video_url, 'watch?v=')) {
            $video_url = str_replace('watch?v=', 'embed/', $video_url);
        } elseif ($video_url && str_contains($video_url, 'youtu.be/')) {
            $video_url = str_replace('youtu.be/', 'www.youtube.com/embed/', $video_url);
        }

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
            'video_url' => $video_url,
            'file_name' => $fileName,
            'file_size' => $fileSize,
            'rangkuman' => $request->rangkuman,
            'status' => $status,
            'pengajar_id' => Auth::id(),
            'kelas_id' => $request->kelas_id
        ]);

        $message = $status === 'draft' ? 'Materi berhasil disimpan sebagai draft!' : 'Materi berhasil dipublikasikan!';

        if ($request->kelas_id) {
            return redirect()->route('pengajar.kelas.show', $request->kelas_id)
                            ->with('success', $message);
        }
        return redirect()->route('pengajar.materi.index')
                        ->with('success', $message);
    }

    public function show(Materi $materi)
    {
        if ($materi->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke materi ini.');
        }

        return view('pengajar.materi.show', compact('materi'));
    }

    public function edit(Materi $materi)
    {
        if ($materi->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit materi ini.');
        }

        return view('pengajar.materi.edit', compact('materi'));
    }

    public function update(Request $request, Materi $materi)
    {
        if ($materi->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengupdate materi ini.');
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'required|string',
            'level' => 'nullable|in:beginner,intermediate,advanced',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:51200', // 50MB
            'video_url' => 'nullable|url',
            'rangkuman' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'kelas_id' => 'nullable|exists:kelas,id'
        ]);

        $updateData = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'level' => $request->level,
            'rangkuman' => $request->rangkuman,
            'status' => $request->status,
            'kelas_id' => $request->kelas_id,
        ];

        // Konversi video_url YouTube
        $video_url = $request->video_url;
        if ($video_url && str_contains($video_url, 'watch?v=')) {
            $video_url = str_replace('watch?v=', 'embed/', $video_url);
        } elseif ($video_url && str_contains($video_url, 'youtu.be/')) {
            $video_url = str_replace('youtu.be/', 'www.youtube.com/embed/', $video_url);
        }
        $updateData['video_url'] = $video_url;

        if ($request->hasFile('file')) {
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

        if ($materi->kelas_id) {
            return redirect()->route('pengajar.kelas.show', $materi->kelas_id)
                        ->with('success', 'Materi berhasil diperbarui!');
        }

        return redirect()->route('pengajar.materi.index')
                        ->with('success', 'Materi berhasil diperbarui!');
    }

    public function destroy(Materi $materi)
    {
        if ($materi->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus materi ini.');
        }

        $kelasId = $materi->kelas_id;

        if ($materi->file_path && Storage::disk('public')->exists($materi->file_path)) {
            Storage::disk('public')->delete($materi->file_path);
        }

        $materi->delete();

        if ($kelasId) {
            return redirect()->route('pengajar.kelas.show', $kelasId)
                            ->with('success', 'Materi berhasil dihapus!');
        }

        return redirect()->route('pengajar.materi.index')
                        ->with('success', 'Materi berhasil dihapus!');
    }

    public function materi()
    {
        $materis = Materi::where('status', 'published')
                        ->with('pengajar')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('materi', compact('materis'));
    }

        public function publish(Materi $materi)
    {
        if ($materi->pengajar_id !== Auth::id()) {
            abort(403, 'Tidak punya akses');
        }

        $materi->update(['status' => 'published']);

        return redirect()->back()->with('success', 'Materi berhasil dipublikasikan!');
    }

}

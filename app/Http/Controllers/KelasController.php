<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class KelasController extends Controller
{
    public function index()
    {

       $kelas = Kelas::withCount('siswa')
                ->where('pengajar_id', Auth::id())
                ->get();

        $totalSiswa = $kelas->sum('siswa_count');
        
        $kelas = Kelas::where('pengajar_id', Auth::id())
                     ->withCount('materis')
                     ->orderBy('created_at', 'desc')
                     ->get();
                     
        return view('pengajar.materi.index-kelas-pengajar', compact('kelas', 'totalSiswa'));
    }

    public function create()
    {
        return view('pengajar.materi.buat-kelas');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_kelas' => 'required|string|max:255',
        'kategori' => 'required|in:programming,design,web,mobile,data,ai,marketing,business',
        'level' => 'required|in:beginner,intermediate,advanced',
        'deskripsi' => 'required|string',
        'durasi' => 'nullable|string|max:100',
        'kapasitas' => 'nullable|integer|min:1',
        'harga' => 'nullable|numeric|min:0',
        'status' => 'required|in:draft,published',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $data = $request->all();
    $data['pengajar_id'] = Auth::id();
    $data['kapasitas'] = $data['kapasitas'] ?? 9999;
    $data['harga'] = $data['harga'] ?? 0;

    // // Handle button action untuk status
    // if ($request->input('action') === 'save_draft') {
    //     $data['status'] = 'draft';
    // } elseif ($request->input('action') === 'publish') {
    //     $data['status'] = 'published';
    // }

    //handle cover image upload
    if ($request->hasFile('cover_image')) {
        $file = $request->file('cover_image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $data['cover_image'] = $file->storeAs('kelas', $fileName, 'public');
    }

    $kelas = Kelas::create($data);

    $message = $data['status'] === 'draft' 
        ? 'Kelas berhasil disimpan sebagai draft!' 
        : 'Kelas berhasil dibuat dan dipublikasikan!';

    return redirect()->route('pengajar.materi.index-kelas-pengajar')
                    ->with('success', $message);
}

    public function show(Kelas $kelas)
    {
        // Cek akses pengajar
        if ($kelas->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke kelas ini.');
        }

        $materis = $kelas->materis()->orderBy('created_at', 'desc')->get();
        $jumlahMateri = $materis->count();

        // Semua kelas milik pengajar yang sedang login
        $allKelas = Kelas::where('pengajar_id', Auth::id())->get();

        return view('pengajar.materi.index-materi-pengajar', compact('kelas', 'materis', 'jumlahMateri', 'allKelas'));
    }

    public function edit(Kelas $kelas)
    {
        if ($kelas->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit kelas ini.');
        }

        return view('pengajar.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        if ($kelas->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengupdate kelas ini.');
        }

        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'kategori' => 'required|in:programming,design,web,mobile,data,ai,marketing,business',
            'level' => 'required|in:beginner,intermediate,advanced',
            'deskripsi' => 'required|string',
            'durasi' => 'nullable|string|max:100',
            'kapasitas' => 'nullable|integer|min:1',
            'harga' => 'nullable|numeric|min:0',
            'status' => 'required|in:draft,published',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();
        $data['kapasitas'] = $data['kapasitas'] ?? 9999;
        $data['harga'] = $data['harga'] ?? 0;

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            // Hapus cover lama jika ada
            if ($kelas->cover_image && Storage::disk('public')->exists($kelas->cover_image)) {
                Storage::disk('public')->delete($kelas->cover_image);
            }

            $file = $request->file('cover_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $data['cover_image'] = $file->storeAs('kelas', $fileName, 'public');
        }

        $kelas->update($data);

        return redirect()->route('pengajar.kelas.show', $kelas)
                        ->with('success', 'Kelas berhasil diperbarui!');
    }

    public function destroy(Kelas $kelas)
    {
        if ($kelas->pengajar_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus kelas ini.');
        }

        //hpus cover image jika ada
        if ($kelas->cover_image && Storage::disk('public')->exists($kelas->cover_image)) {
            Storage::disk('public')->delete($kelas->cover_image);
        }

        $kelas->delete();

        return redirect()->route('pengajar.kelas.index')
                        ->with('success', 'Kelas berhasil dihapus!');
    }
}
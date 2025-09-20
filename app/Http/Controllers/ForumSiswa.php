<?php

namespace App\Http\Controllers;

use App\Models\Diskusi;
use App\Models\DiskusiSuka;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumSiswa extends Controller
{
    public function index(Kelas $kelas)
    {
       
         $forumPosts = $kelas->diskusi()->with(['user', 'balasan.user'])->latest()->get();

        
        return view('desktop.pages.forum.forum-siswa', compact('kelas', 'forumPosts'));
    }
   public function forumSiswa($kelasId)
    {
    $kelas = Kelas::findOrFail($kelasId);

   
    $diskusiPengajar = Diskusi::where('kelas_id', $kelasId)
        ->with('user')  
        ->orderBy('created_at', 'desc')
        ->get();

    return view('desktop.pages.forum.forum-siswa', [
        'nama_kelas' => $kelas->nama_kelas,
        'diskusiPengajar' => $diskusiPengajar,
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

    public function SiswaDiskusi($kelasId)
    {
        
        $kelas = Kelas::with('diskusi.user', 'diskusi.balasan.user')->findOrFail($kelasId);
        return view('desktop.pages.forum.forum-siswa', compact('kelas'));
    }

    ///BALAS FORUM
    public function siswaBalasan(Request $request, $diskusiId)
{
    // Validasi konten balasan
    $request->validate([
        'konten' => 'required|string',
    ]);

    // Temukan diskusi yang akan dibalas
    $diskusi = Diskusi::findOrFail($diskusiId);

    // Simpan balasan baru
    $diskusi->balasan()->create([
        'konten' => $request->konten,
        'user_id' => Auth::id(), 
    ]);

    return redirect()->back()->with('success', 'Balasan berhasil dikirim.');
}

    
    public function diskusiSuka($diskusiId)
    {
        DiskusiSuka::firstOrCreate([
                'diskusi_id' => $diskusiId,
                'user_id'   => Auth::user()->id
            ]);
        
        return redirect()->back()->with('success', 'postingan berhasil di like.');
    }


        public function userProgress($kelasId)
    {
        $userId = auth()->id();

        $total = \App\Models\Materi::where('kelas_id', $kelasId)->where('status', 'published')->count();

        $completed = \App\Models\UserMateriProgress::where('user_id', $userId)
                        ->whereHas('materi', function ($q) use ($kelasId) {
                            $q->where('kelas_id', $kelasId);
                        })
                        ->where('status', 'completed')
                        ->count();

        $percentage = $total > 0 ? round(($completed / $total) * 100) : 0;

        return response()->json([
            'progress' => $percentage
        ]);
    }

}

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
       
        // Load data kelas dan forum diskusinya
        // Contoh: ambil semua diskusi terkait kelas ini

         $forumPosts = $kelas->diskusi()->with(['user', 'balasan.user'])->latest()->get();

        
        return view('desktop.pages.forum.forum-siswa', compact('kelas', 'forumPosts'));
    }
   public function forumSiswa($kelasId)
    {
    $kelas = Kelas::findOrFail($kelasId);

    // Ambil diskusi pengajar yang terkait langsung dengan kelas ini
    $diskusiPengajar = Diskusi::where('kelas_id', $kelasId)
        ->with('user')  // relasi ke user/pengajar agar bisa nampilin nama pengajar
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
        'user_id' => Auth::id(), // Balasan milik pengguna yang sedang login
    ]);

    // Redirect kembali ke halaman diskusi
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
}

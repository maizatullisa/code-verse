<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\Materi;
use Auth;
use Illuminate\Http\Request;

class DaftarBelajarController extends Controller
{
    public function simpan(Request $request)
    {
        // Handle both kelas_id and selected_materis
        if ($request->has('kelas_id')) {
            // Ambil kelas berdasarkan kelas_id
            $request->validate([
                'kelas_id' => 'required|exists:kelas,id'
            ]);

            $user = Auth::user();
            $kelas = Kelas::with(['materis' => function($query) {
                $query->where('status', 'published');
            }])->findOrFail($request->kelas_id);

            // Ambil semua materi dari kelas yang dipilih
            $materiIds = $kelas->materis->pluck('id')->toArray();

            if (empty($materiIds)) {
                return back()->with('info', 'Kelas ini belum memiliki materi yang dipublikasikan.');
            }

            // Tambahkan semua materi kelas ke daftar belajar user
            foreach ($materiIds as $materiId) {
                if (!$user->materiDipelajari()->where('materi_id', $materiId)->exists()) {
                    $user->materiDipelajari()->attach($materiId, [
                        'status' => 'belum',
                        'progress' => 0,
                    ]);
                }
            }

            return back()->with('success', "Berhasil mengambil kelas '{$kelas->nama_kelas}' dengan " . count($materiIds) . " materi.");
        } 
        
        // Handle selected_materis (existing functionality)
        if ($request->has('selected_materis')) {
            $request->validate([
                'selected_materis' => 'required|array',
                'selected_materis.*' => 'exists:materis,id'
            ]);

            $user = Auth::user();

            foreach ($request->selected_materis as $materiId) {
                if (!$user->materiDipelajari()->where('materi_id', $materiId)->exists()) {
                    $user->materiDipelajari()->attach($materiId, [
                    'status' => 'belum',
                    'progress' => 0,  
                ]);

                }
            }

            return back()->with('success', 'Materi berhasil ditambahkan ke daftar belajar.');
        }

        return back()->with('error', 'Data tidak valid.');
    }
 
    public function show($id)
    {
        $pengajar = User::with('materis')->findOrFail($id);
        $user = Auth::user();
        //ambl id materi yg sdh ditambah ke daftar belajar
        $materiDipilihUser = $user->materiDipelajari()->pluck('materi_id')->toArray();
        return view('detail', compact('pengajar', 'materiDipilihUser'));
    }

    public function index()
    {
        $user = Auth::user();
        
        // Ambil materi yang sedang dipelajari
        $materis = $user->materiDipelajari()
            ->wherePivot('status', 'belum')
            ->with('pengajar')
            ->get();

        // Ambil kelas yang sudah diambil user (punya materi di daftar belajar)
        $kelasDiambil = Kelas::whereHas('materis', function($query) use ($user) {
            $query->whereHas('siswa', function($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        })
        ->with(['materis' => function($query) use ($user) {
            $query->whereHas('siswa', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->with('pengajar');
        }, 'pengajar'])
        ->withCount(['materis' => function($query) use ($user) {
            $query->whereHas('siswa', function($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }])
        ->get();

        return view('kelas', compact('materis', 'kelasDiambil'));
    }

    /**
     * Tampilkan semua kelas yang sudah diambil user
     */
    public function kelasSaya()
    {
        $user = Auth::user();
        
        // Ambil kelas yang sudah diambil user (punya materi di daftar belajar)
        $kelasDiambil = Kelas::whereHas('materis', function($query) use ($user) {
            $query->whereHas('siswa', function($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        })
        ->with(['materis' => function($query) use ($user) {
            $query->whereHas('siswa', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->with('pengajar');
        }, 'pengajar'])
        ->withCount(['materis' => function($query) use ($user) {
            $query->whereHas('siswa', function($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }])
        ->get();
        // Untuk konsistensi dengan view kelas.blade.php, kirim juga materis kosong
        $materis = collect();

        return view('kelas', compact('kelasDiambil', 'materis'));
    }

        /**
         * Tampilkan detail pembelajaran kelas (seperti Dicoding)
         */
        public function pembelajaran($kelasId)
        {
            $user = Auth::user();
            
            // Ambil kelas dengan materinya
            $kelas = Kelas::where('id', $kelasId)->with(['pengajar'])->firstOrFail();
            
            // Ambil semua materi yang sudah diambil user dari kelas ini
            $materis = $user->materiDipelajari()
                ->where('kelas_id', $kelasId)
                ->orderBy('created_at', 'asc')
                ->get();
            
            // Pastikan user sudah mengambil minimal 1 materi dari kelas ini
            if ($materis->isEmpty()) {
                abort(404, 'Anda belum mengambil kelas ini.');
            }
            
            // Set materis ke kelas object untuk konsistensi
            $kelas->materis = $materis;

            return view('pembelajaran', compact('kelas'));
        }

        /**
         * Update progress materi
         */
        public function updateProgress(Request $request, $materiId)
        {
            $user = Auth::user();
            
            $request->validate([
                'status' => 'required|in:belum,selesai',
                'progress' =>'required|integer|min:0|max:100',
            ]);
            
            $user->materiDipelajari()->updateExistingPivot($materiId, [
                'status' => $request->status,
                'progress' => $request->progress
            ]);
            
            return response()->json(['success' => true]);
        }

        /**
         * View materi (dokumen/video viewer)
         */
        public function viewMateri($kelasId, $materiId)
        {
            $user = Auth::user();
            
            // Ambil kelas dan pastikan user sudah mengambil kelas ini
            $kelas = Kelas::where('id', $kelasId)
                ->whereHas('materis', function($query) use ($user) {
                    $query->whereHas('siswa', function($q) use ($user) {
                        $q->where('user_id', $user->id);
                    });
                })
                ->with(['pengajar'])
                ->firstOrFail();
            
            // Ambil materi yang akan ditampilkan
            $materi = $user->materiDipelajari()
                ->where('materi_id', $materiId)
                ->where('kelas_id', $kelasId)
                ->with(['pengajar'])
                ->firstOrFail();
            
            // Update status ke 'sedang' jika masih 'belum'
                if ($materi->pivot->status === 'belum') {
                $user->materiDipelajari()->updateExistingPivot($materiId, [
                    'progress' => 10
                ]);
                $materi->refresh();
            }

            
            // Ambil semua materi kelas untuk navigasi
            $allMateris = $user->materiDipelajari()
                ->where('kelas_id', $kelasId)
                ->orderBy('created_at', 'asc')
                ->get();
            
            // Cari index materi saat ini
            $currentIndex = $allMateris->search(function($item) use ($materiId) {
                return $item->id == $materiId;
            });
            
            // Tentukan materi sebelumnya dan selanjutnya
            $previousMateri = $currentIndex > 0 ? $allMateris[$currentIndex - 1] : null;
            $nextMateri = $currentIndex < $allMateris->count() - 1 ? $allMateris[$currentIndex + 1] : null;
            
            return view('view-materi', compact('kelas', 'materi', 'allMateris', 'previousMateri', 'nextMateri', 'currentIndex'));
        }
        //desktop
        
    }
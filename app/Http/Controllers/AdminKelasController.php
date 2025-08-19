<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use App\Models\User;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminKelasController extends Controller
{

    public function index(Request $request)
    {
        // Stats data
        $totalKelas = Kelas::count();
        $kelasAktif = Kelas::where('status', 'aktif')->count(); // atau 'published' sesuai database
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalPengajar = User::where('role', 'pengajar')->count();
        
        // Query builder untuk kelas
        $query = Kelas::with(['pengajar'])
            ->withCount(['materis']); // tambah enrollments jika ada relasi
        
        // Filter berdasarkan search
        if ($request->filled('search')) {
            $query->where('nama_kelas', 'like', '%' . $request->search . '%');
        }
        
        // Filter berdasarkan tingkat
        if ($request->filled('tingkat')) {
            $query->where('tingkat', $request->tingkat);
        }
        
        // Filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        
        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        } else {
            // Jika tidak ada filter status, tampilkan semua kecuali yang di-delete
            $query->whereIn('status', ['aktif', 'draft', 'published', 'nonaktif']);
        }
        
        // Get data dengan pagination
        $kelasList = $query->orderBy('created_at', 'desc')->paginate(9);
        
        // Untuk debugging - hapus setelah selesai
        if ($request->has('debug')) {
            dd([
                'total_query' => $query->count(),
                'kelasList_count' => $kelasList->count(),
                'first_kelas' => $kelasList->first(),
                'request_params' => $request->all()
            ]);
        }

        return view('admin.kelas.index', compact(
            'totalKelas', 
            'kelasAktif', 
            'totalSiswa', 
            'totalPengajar',
            'kelasList'
        ));
    }

//    public function index()
//    {
//     $users = User::all();
//     $totalSiswa = User::where('role', 'siswa')->count();
//     $totalPengajar = User::where('role', 'pengajar')->count();
//     $totalMateri = Materi::count();

//             $kelasList = Kelas::where('status', 'published') // hanya kelas yang published
//             ->whereHas('materis', function ($query) {
//                 $query->where('status', 'published');
//             })
//             ->with(['materis' => function ($query) {
//                 $query->where('status', 'published')
//                       ->orderBy('created_at', 'desc');
//             }, 'pengajar'])
//             ->withCount(['materis' => function ($query) {
//                 $query->where('status', 'published');
//             }])
//             ->orderBy('created_at', 'desc')
//             ->get();


//     return view('admin.kelas.index', compact('users', 'totalSiswa', 'totalPengajar', 'totalMateri','kelasList'));
//    }  
  
}

<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use App\Models\User;
use App\Models\Materi;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AdminKelasController extends Controller
{

    public function index(Request $request)
    {
        // Stats data
        $totalKelas = Kelas::count();
        $kelasAktif = Kelas::where('status', 'published')->count(); 
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalPengajar = User::where('role', 'pengajar')->count();
        
        
        // Query builder untuk kelas
        $query = Kelas::with(['pengajar'])
            ->withCount(['materis', 'enrollments']);

        
        // Filter berdasarkan search
        if ($request->filled('search')) {
            $query->where('nama_kelas', 'like', '%' . $request->search . '%');
        }
        
        
        // Filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        
        
        // Get data dengan pagination
        $kelasList = $query->orderBy('created_at', 'desc')->paginate(9);
       
        foreach ($kelasList as $kelas) {
            $totalMateri = $kelas->materis_count;
            if ($totalMateri > 0) {
                // Hitung jumlah siswa yang menyelesaikan materi (contoh rata-rata progress per kelas)
                $completedMateri = DB::table('user_materi_progress')
                    ->whereIn('materi_id', $kelas->materis->pluck('id'))
                    ->where('status', 'completed')
                    ->count();
                
                $kelas->progress = round(($completedMateri / $totalMateri), 0); // Bisa dikali 100 jika ingin persen
            } else {
                $kelas->progress = 0;
            }
        }

        return view('admin.kelas.index', compact(
            'totalKelas', 
            'kelasAktif', 
            'totalSiswa', 
            'totalPengajar',
            'kelasList'
        ));
    }

    public function download(Request $request)
{
    $query = Kelas::query();

    // Filter kategori
    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    // Filter search
    if ($request->filled('search')) {
        $query->where('nama_kelas', 'like', '%'.$request->search.'%');
    }

    $kelas = $query->get();

    $csvHeader = ['ID', 'Nama Kelas', 'Kategori', 'Level', 'Deskripsi', 'Durasi', 'Kapasitas', 'Harga', 'Status'];
    $callback = function() use ($kelas, $csvHeader) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $csvHeader);
        foreach ($kelas as $k) {
            fputcsv($file, [
                $k->id,
                $k->nama_kelas,
                $k->kategori,
                $k->level,
                $k->deskripsi,
                $k->durasi,
                $k->kapasitas,
                $k->harga,
                $k->status
            ]);
        }
        fclose($file);
    };

    $filename = 'kelas_data_'.date('Y-m-d_H-i-s').'.csv';
    return Response::stream($callback, 200, [
        "Content-Type" => "text/csv",
        "Content-Disposition" => "attachment; filename={$filename}",
    ]);
}

    public function destroy($id)
    {
        $kelas = Kelas::with(['materis.quizzes'])->find($id);

        if (!$kelas) {
            return redirect()->back()->with('error', 'Kelas tidak ditemukan.');
        }

        // Hapus semua quiz yang ada di setiap materi
        foreach ($kelas->materis as $materi) {
            $materi->quizzes()->delete();
        }

        // Hapus semua materi
        $kelas->materis()->delete();

        // Hapus kelas
        $kelas->delete();

        return redirect()->back()->with('success', 'Kelas dan semua materi & quiz di dalamnya berhasil dihapus.');
    }

}

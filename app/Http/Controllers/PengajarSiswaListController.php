<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CourseEnrollment;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class PengajarSiswaListController extends Controller
{
   public function index(Request $request)
   {
        $pengajarId = auth()->id();
        $search = $request->get('search');

        // Ambil semua kelas milik pengajar
        $kelasPengajar = Kelas::where('pengajar_id', $pengajarId)->pluck('id');

        // Ambil semua enrollment siswa di kelas pengajar ini
        $enrollments = CourseEnrollment::with('user', 'kelas')
                        ->whereIn('kelas_id', $kelasPengajar)
                        ->get();

        // Siapkan data siswa dengan info kelas yang diambil
        $siswaCollection = $enrollments->groupBy('user_id')->map(function($items, $userId) {
            $user = $items->first()->user;
            return [
                'id' => $user->id,
                'nama' => $user->first_name,
                'foto' => $user-> profile_photo,
                'kelas' => $items->pluck('kelas.nama_kelas')->toArray(),
                'jumlah_kelas' => $items->count(),
            ];
        });

        // Search
        if ($search) {
            $siswaCollection = $siswaCollection->filter(function($item) use ($search) {
                return stripos($item['nama'], $search) !== false;
            });
        }

        // Pagination manual
        $perPage = 50;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $siswaCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $siswa = new LengthAwarePaginator(
            $currentItems,
            $siswaCollection->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        // Total siswa dan jumlah kelas berbeda
        $totalSiswa = $siswaCollection->count();
        $totalKelasBeda = $siswaCollection->sum('jumlah_kelas');

        return view('pengajar.siswa.siswa-pengajar', compact('siswa', 'totalSiswa', 'totalKelasBeda'));
   }

   
}

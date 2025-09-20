<?php
namespace App\Http\Controllers;

use App\Models\CourseEnrollment;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajarSiswaListController extends Controller
{
    public function index(Request $request)
    {
        $pengajarId = Auth::id();
        $search = $request->get('search');

        $kelas = Kelas::where('pengajar_id', $pengajarId)
            ->when($search, function ($query, $search) {
                $query->where('nama_kelas', 'like', "%{$search}%")
                      ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->withCount('enrollments')
            ->paginate(12)
            ->appends(['search' => $search]);

        return view('pengajar.siswa.index', compact('kelas', 'search'));
    }

    public function show(Request $request, $kelasId)
{
    $pengajarId = Auth::id();

    $kelas = Kelas::where('pengajar_id', $pengajarId)
                ->findOrFail($kelasId);

    $search = $request->input('search');

    $siswa = CourseEnrollment::with('user')
                ->where('kelas_id', $kelas->id)
                ->when($search, function ($query, $search) {
                    $query->whereHas('user', function ($q) use ($search) {
                        $q->where('first_name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%");
                    });
                })
                ->paginate(20)
                ->withQueryString(); 

    return view('pengajar.siswa.show', compact('kelas', 'siswa', 'search'));
}


}

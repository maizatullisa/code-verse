<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasPreviewController extends Controller
{
      public function index(Kelas $kelas)
    {
        if ($kelas->status !== 'published' && $kelas->pengajar_id !== Auth::id()) {
            return redirect()->route('desktop.dashboard-user-desktop')
                ->with('error', 'Kelas ini belum tersedia.');
        }

        $kelas->load([
            'pengajar.profilePengajar.riwayatPendidikan',
            'materis' => function($query) {
                $query->orderBy('created_at', 'asc');
            }
        ]);

        $kelasLainDariPengajar = $kelas->pengajar->kelas()
        ->where('id', '!=', $kelas->id)//tdk mengmbil kelas yg sdg tmpil
        ->where('status', 'published')
        ->latest()
        ->take(6) 
        ->get();

        $totalSiswaPengajar = \App\Models\CourseEnrollment::whereIn(
            'kelas_id',
            $kelas->pengajar->kelas()->pluck('id') 
        )
        ->where('status', 'approved')
        ->count();

        $totalKelasPengajar = $kelas->pengajar->kelas()->count();

        $isEnrolled = false;
        if (Auth::check()) {
            $isEnrolled = CourseEnrollment::where('user_id', Auth::id())
                ->where('kelas_id', $kelas->id)
                ->where('status', 'approved')
                ->exists();
        }

        $enrollmentCount = CourseEnrollment::where('kelas_id', $kelas->id)
            ->where('status', 'approved')
            ->count();

        $courseData = [
            'id' => $kelas->id,
            'nama_kelas' => $kelas->nama_kelas,
            'cover_image' => $kelas->cover_image ? asset('storage/' . $kelas->cover_image) : asset('assets/images/library-favourite-img1.png'),
            'pengajar_nama' => $kelas->pengajar->profilePengajar->full_name ?? $kelas->pengajar->first_name,
            'pengajar_avatar' => $kelas->pengajar->profilePengajar->photo 
                ? asset($kelas->pengajar->profilePengajar->photo)
                : asset('assets/images/instructor-avatar.jpg'),
            'pengajar_keahlian' => $kelas->pengajar->profilePengajar->expertise ?? 'Pengajar berpengalaman dengan keahlian di bidang ' . ucfirst($kelas->kategori),
            'pengajar_jabatan' => $kelas->pengajar->profilePengajar->academic_position ?? null,
            'pengajar_fakultas' => $kelas->pengajar->profilePengajar->faculty ?? null,
            'pengajar_prodi' => $kelas->pengajar->profilePengajar->study_program ?? null,
            'riwayat_pendidikan' => $kelas->pengajar->profilePengajar->riwayatPendidikan ?? collect(),
            'total_siswa_pengajar' => $totalSiswaPengajar,
            'total_kelas_pengajar' => $totalKelasPengajar,
            'formatted_harga' => $kelas->formatted_harga,
            'level' => ucfirst($kelas->level),
            'kategori' => ucfirst($kelas->kategori),
            'durasi' => $kelas->durasi ?? '8 minggu pembelajaran',
            'kapasitas' => $kelas->kapasitas,
            'deskripsi' => $kelas->deskripsi,
            'enrollment_count' => $enrollmentCount,
            'materi_count' => $kelas->materis->count(),
            'is_enrolled' => $isEnrolled,
            'status' => $kelas->status,
            'created_at' => $kelas->created_at,
            'updated_at' => $kelas->updated_at
        ];

        return view('desktop.pages.kelas.kelas-previews', compact('kelas', 'courseData',  'isEnrolled',  'kelasLainDariPengajar'));
    }



}

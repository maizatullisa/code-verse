<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasDetailController extends Controller
{
    public function show(Kelas $kelas)
    {
        if ($kelas->status !== 'published' && $kelas->pengajar_id !== Auth::id()) {
            return redirect()->route('desktop.dashboard-user-desktop')
                ->with('error', 'Kelas ini belum tersedia.');
        }

        //load relasi yang dibutuhkan
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
        ->take(6) // ambil maksimal 6 kelas
        ->get();


        // Hitung total siswa dari semua kelas milik pengajar ini
        $totalSiswaPengajar = \App\Models\CourseEnrollment::whereIn(
            'kelas_id',
            $kelas->pengajar->kelas()->pluck('id') // ambil semua kelas_id yang dibuat oleh pengajar 
        )
        ->where('status', 'approved')
        ->count();

        $totalKelasPengajar = $kelas->pengajar->kelas()->count();


        //cek user sudah terdaftar di kelas ini???
        $isEnrolled = false;
        if (Auth::check()) {
            $isEnrolled = CourseEnrollment::where('user_id', Auth::id())
                ->where('kelas_id', $kelas->id)
                ->where('status', 'approved')
                ->exists();
        }

        // Hitung statistik kelas
        $enrollmentCount = CourseEnrollment::where('kelas_id', $kelas->id)
            ->where('status', 'approved')
            ->count();

        // data yang akan dikirim ke view
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

        // Kelompokkan materi berdasarkan minggu atau modul
        // $groupedMateris = $this->groupMateris($kelas->materis);

        return view('desktop.pages.kelas.kelas-detail', compact('kelas', 'courseData', 'isEnrolled',  'kelasLainDariPengajar'));
    }


    // private function groupMateris($materis)
    // {
    //     $grouped = [];
    //     $currentWeek = 1;
    //     $materiPerWeek = 4; // Asumsi 4 materi per minggu

    //     foreach ($materis->chunk($materiPerWeek) as $index => $chunk) {
    //         $weekNumber = $index + 1;
    //         $grouped["Week {$weekNumber}"] = [
    //             'title' => "Week {$weekNumber}: " . $this->getWeekTitle($weekNumber),
    //             'description' => $this->getWeekDescription($weekNumber),
    //             'materi_count' => $chunk->count(),
    //             'quiz_count' => 1, // Asumsi ada 1 quiz per minggu
    //             'materis' => $chunk
    //         ];
    //     }

    //     return $grouped;
    // }

    // private function getWeekTitle($weekNumber)
    // {
    //     $titles = [
    //         1 => 'Introduction & Fundamentals',
    //         2 => 'Core Concepts',
    //         3 => 'Advanced Topics',
    //         4 => 'Practical Applications',
    //         5 => 'Project Development',
    //         6 => 'Integration & Testing',
    //         7 => 'Optimization & Performance',
    //         8 => 'Final Project & Review'
    //     ];

    //     return $titles[$weekNumber] ?? 'Learning Module';
    // }

    // private function getWeekDescription($weekNumber)
    // {
    //     $descriptions = [
    //         1 => 'Memahami dasar-dasar dan setup environment',
    //         2 => 'Mempelajari konsep inti dan fundamental',
    //         3 => 'Mendalami topik-topik advanced',
    //         4 => 'Aplikasi praktis dalam project nyata',
    //         5 => 'Pengembangan project komprehensif',
    //         6 => 'Integrasi sistem dan testing',
    //         7 => 'Optimasi performa dan best practices',
    //         8 => 'Final project dan review menyeluruh'
    //     ];

    //     return $descriptions[$weekNumber] ?? 'Materi pembelajaran';
    // }

    // private function getLearningObjectives($kategori)
    // {
    //     $objectives = [
    //         'programming' => [
    //             'Fundamental Programming dan Syntax',
    //             'Data Structures dan Algorithms',
    //             'Object-Oriented Programming',
    //             'Error Handling dan Debugging',
    //             'API Integration dan Database',
    //             'Testing dan Documentation'
    //         ],
    //         'web' => [
    //             'HTML5, CSS3, dan JavaScript Modern',
    //             'Responsive Web Design',
    //             'Frontend Frameworks',
    //             'Backend Development',
    //             'Database Management',
    //             'Web Security dan Performance'
    //         ],
    //         'design' => [
    //             'Design Principles dan Color Theory',
    //             'Typography dan Layout',
    //             'User Interface Design',
    //             'User Experience Research',
    //             'Design Tools dan Software',
    //             'Portfolio Development'
    //         ],
    //         'mobile' => [
    //             'Mobile Development Fundamentals',
    //             'Native vs Cross-Platform',
    //             'UI/UX for Mobile',
    //             'Mobile APIs dan Services',
    //             'App Store Deployment',
    //             'Mobile Performance Optimization'
    //         ]
    //     ];

    //     return $objectives[$kategori] ?? [
    //         'Fundamental concepts dan best practices',
    //         'Hands-on project development',
    //         'Industry standard tools',
    //         'Problem solving techniques',
    //         'Portfolio worthy projects',
    //         'Career preparation'
    //     ];
    // }

    // private function getCourseRequirements($level)
    // {
    //     $requirements = [
    //         'beginner' => [
    //             'Tidak memerlukan pengalaman sebelumnya',
    //             'Komputer dengan koneksi internet stabil',
    //             'Antusiasme untuk belajar hal baru'
    //         ],
    //         'intermediate' => [
    //             'Pemahaman dasar tentang topik terkait',
    //             'Pengalaman minimal 6 bulan di bidang ini',
    //             'Komputer dengan koneksi internet stabil',
    //             'Text editor atau IDE yang sesuai'
    //         ],
    //         'advanced' => [
    //             'Pengalaman solid di bidang yang relevan',
    //             'Pemahaman mendalam konsep fundamental',
    //             'Portfolio project sebelumnya',
    //             'Development environment yang lengkap'
    //         ]
    //     ];

    //     return $requirements[$level] ?? [
    //         'Komputer dengan koneksi internet stabil',
    //         'Motivasi tinggi untuk belajar',
    //         'Waktu yang cukup untuk praktek'
    //     ];
    // }
}
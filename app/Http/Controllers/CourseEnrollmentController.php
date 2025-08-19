<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseEnrollmentController extends Controller
{
    /**
     * Display the enrollment form for a specific class
     * Route: /kelas/{kelas}/pendaftaran
     */
    public function create(Kelas $kelas)
    {
        // Pastikan kelas sudah published
        if ($kelas->status !== 'published') {
            return redirect()->back()
                ->with('error', 'Kelas ini belum tersedia untuk pendaftaran.');
        }

        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('info', 'Silakan login terlebih dahulu untuk mendaftar kelas.');
        }

        // Cek apakah user sudah terdaftar di kelas ini
        $existingEnrollment = CourseEnrollment::where('user_id', Auth::id())
            ->where('kelas_id', $kelas->id)
            ->first();

        if ($existingEnrollment) {
            return redirect()->back()
                ->with('info', 'Anda sudah terdaftar di kelas ini.');
        }

        // Load data kelas dengan relasi yang dibutuhkan
        $kelas->load(['pengajar', 'materis']);

        // Data untuk sidebar
        $courseData = [
            'id' => $kelas->id,
            'nama_kelas' => $kelas->nama_kelas,
            'cover_image' => $kelas->cover_image ? asset('storage/' . $kelas->cover_image) : 'https://via.placeholder.com/300x200/3B82F6/FFFFFF?text=Course',
            'pengajar' => $kelas->pengajar->first_name ?? 'Pengajar',
            'harga' => $kelas->harga,
            'formatted_harga' => $kelas->formatted_harga,
            'level' => $kelas->level,
            'durasi' => $kelas->durasi ?? '8 minggu',
            'kapasitas' => $kelas->kapasitas,
            'jumlah_materi' => $kelas->materis->count(),
            'kategori' => $kelas->kategori,
            'deskripsi' => $kelas->deskripsi,
            // Data untuk benefits
            'benefits' => [
                'Akses ke semua materi pembelajaran',
                'Video berkualitas HD',
                'Diskusi dengan instruktur',
                'Tugas dan latihan praktis',
                'Sertifikat setelah menyelesaikan kelas',
                'Akses seumur hidup',
                'Grup komunitas eksklusif',
                'Update materi terbaru'
            ]
        ];

        return view('desktop.pages.kelas.kelas-pendaftaran', compact('kelas', 'courseData'));
    }

    /**
     * Store the enrollment data from the form
     * Route: POST /kelas/{kelas}/pendaftaran
     */
    public function store(Request $request, Kelas $kelas)
{

   
    // Validasi input dari 3 step form
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'whatsapp' => 'required|string|max:20',
        'birth_date' => 'required|date|before:today',
        'education' => 'required|in:SMA/SMK,D3,S1,S2,S3',
        'experience' => 'nullable|in:beginner,basic,intermediate,advanced',
        'motivation' => 'nullable|string|max:1000',
        'features' => 'nullable|array',
        'features.*' => 'in:certificate,lifetime',
        'goals' => 'nullable|string|max:1000',
        'newsletter_subscription' => 'nullable|boolean'
    ]);

    // Cek double enrollment
    $existingEnrollment = CourseEnrollment::where('user_id', Auth::id())
        ->where('kelas_id', $kelas->id)
        ->first();

    if ($existingEnrollment) {
        if ($request->ajax()) {
            return response()->json([
                'message' => 'Anda sudah terdaftar di kelas ini.'
            ], 409); // Conflict
        }
        return redirect()->back()->with('error', 'Anda sudah terdaftar di kelas ini.');
    }

    $enrollment = CourseEnrollment::create([
        'user_id' => Auth::id(),
        'kelas_id' => $kelas->id,
        'full_name' => $request->full_name,
        'email' => $request->email,
        'whatsapp' => $request->whatsapp,
        'birth_date' => $request->birth_date,
        'education' => $request->education,
        'experience' => $request->experience,
        'motivation' => $request->motivation,
        'features' => $request->features ?? [],
        'goals' => $request->goals,
        'status' => 'approved',
        'newsletter_subscription' => $request->boolean('newsletter_subscription'),
        'enrolled_at' => now(),
    ]);

    if ($request->ajax()) {
        return response()->json([
            'message' => 'Pendaftaran berhasil!',
            'redirect_url' => route('desktop.pages.forum.forum-siswa', $kelas->id),
            'dashboard_url' => route('desktop.dashboard-user-desktop'),
        ]);
    }

    return redirect()->route('desktop.pages.forum.forum-siswa',  $kelas->id)
        ->with('success', 'Pendaftaran berhasil! Anda sekarang dapat mengakses kelas.');
}

    /**
     * Display list of user enrollments (Dashboard)
     * Route: /my-enrollments
     */
    public function index()
    {
        $enrollments = CourseEnrollment::with(['kelas.pengajar', 'kelas.materis'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Group by status untuk statistik
        $stats = [
            'total' => $enrollments->count(),
            'active' => $enrollments->where('status', 'approved')->count(),
            'pending' => $enrollments->where('status', 'pending')->count(),
            'completed' => $enrollments->where('status', 'completed')->count(),
        ];

        return view('desktop.pages.kelas.kelas-diambil', compact('enrollments', 'stats'));
    }

    /**
     * Show success page after enrollment
     * Route: /enrollments/{enrollment}/success
     */
    public function success(CourseEnrollment $enrollment)
    {
        // Cek kepemilikan enrollment
        if ($enrollment->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke enrollment ini.');
        }

        $enrollment->load(['kelas']);

        return view('desktop.pages.kelas.kelas-detail', compact('enrollment'));
    }
    public function show(CourseEnrollment $enrollment)
    {
        // Cek kepemilikan enrollment
        if ($enrollment->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke enrollment ini.');
        }

        $enrollment->load(['kelas.pengajar', 'kelas.materis']);

        return view('desktop.pages.enrollment.show', compact('enrollment'));
    }

    /**
     * Cancel enrollment
     * Route: DELETE /enrollments/{enrollment}
     */
    public function destroy(CourseEnrollment $enrollment)
    {
        // Cek kepemilikan enrollment
        if ($enrollment->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki akses untuk membatalkan enrollment ini.'
            ], 403);
        }

        // Update status instead of delete (untuk audit trail)
        $enrollment->update([
            'status' => 'cancelled'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran kelas berhasil dibatalkan.'
        ]);
    }
}
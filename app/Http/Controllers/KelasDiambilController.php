<?php

namespace App\Http\Controllers;

use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasDiambilController extends Controller
{
    // public function index()
    // {
    //     // Query dasar untuk menghitung stats
    //     $baseQuery = CourseEnrollment::where('user_id', Auth::id());
        
    //     // Hitung stats dari total data
    //     $totalEnrollments = $baseQuery->get();
    //     $stats = [
    //         'total' => $totalEnrollments->count(),
    //         'active' => $totalEnrollments->where('status', 'approved')->count(),
    //         'pending' => $totalEnrollments->where('status', 'pending')->count(),
    //         'completed' => $totalEnrollments->where('status', 'completed')->count(),
    //     ];

    //     // Query untuk pagination
    //     $enrollments = CourseEnrollment::with(['kelas.pengajar', 'kelas.materis'])
    //         ->where('user_id', Auth::id())
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(5);

    //     return view('desktop.pages.kelas.kelas-diambil', compact('enrollments', 'stats'));
    // }

        public function index(Request $request)
    {
  
        $keyword = $request->input('search');

        // Query dasar untuk menghitung stats
        $baseQuery = CourseEnrollment::where('user_id', Auth::id());

        // Hitung stats dari total data
        $totalEnrollments = $baseQuery->get();
        $stats = [
            'total'     => $totalEnrollments->count(),
            'active'    => $totalEnrollments->where('status', 'approved')->count(),
            'pending'   => $totalEnrollments->where('status', 'pending')->count(),
            'completed' => $totalEnrollments->where('status', 'completed')->count(),
        ];

        // Query utama untuk data enrollments
        $enrollmentsQuery = CourseEnrollment::with(['kelas.pengajar', 'kelas.materis'])
            ->where('user_id', Auth::id());

        //filter search (cari di nama_kelas / deskripsi)
        if (!empty($keyword)) {
            $enrollmentsQuery->whereHas('kelas', function ($q) use ($keyword) {
                $q->where('nama_kelas', 'LIKE', "%{$keyword}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$keyword}%");
            });
        }

        $enrollments = $enrollmentsQuery->orderBy('created_at', 'desc')
            ->paginate(5)
            ->appends(['search' => $keyword]); // biar pagination bawa query search

        return view('desktop.pages.kelas.kelas-diambil', compact('enrollments', 'stats', 'keyword'));
    }

}
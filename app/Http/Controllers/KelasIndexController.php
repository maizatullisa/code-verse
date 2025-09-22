<?php

namespace App\Http\Controllers;

use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasIndexController extends Controller
{
      public function index(Request $request)
    {
        $keyword = $request->input('search');

        $baseQuery = CourseEnrollment::where('user_id', Auth::id());

        $totalEnrollments = $baseQuery->get();
        $stats = [
            'total'     => $totalEnrollments->count(),
            'active'    => $totalEnrollments->where('status', 'approved')->count(),
            'pending'   => $totalEnrollments->where('status', 'pending')->count(),
            'completed' => $totalEnrollments->where('status', 'completed')->count(),
        ];

           $enrollmentsQuery = CourseEnrollment::with([
            'kelas.pengajar', 
            'kelas.materis',
            'kelas' => function($query) {
                $query->withCount(['enrollments as total_siswa']);
            }
        ])
            ->where('user_id', Auth::id());

        if (!empty($keyword)) {
            $enrollmentsQuery->whereHas('kelas', function ($q) use ($keyword) {
                $q->where('nama_kelas', 'LIKE', "%{$keyword}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$keyword}%");
            });
        }

        $enrollments = $enrollmentsQuery->orderBy('created_at', 'desc')
            ->paginate(5)
            ->appends(['search' => $keyword]); 

        return view('desktop.pages.kelas.kelas-index', compact('enrollments', 'stats', 'keyword'));
    }

     public function loadMore(Request $request)
    {
        $enrollments = CourseEnrollment::with(['kelas.pengajar'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'page', $request->page);

        return response()->json([
            'enrollments' => $enrollments->items(),
            'hasMore' => $enrollments->hasMorePages()
        ]);
    }


}

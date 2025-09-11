<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserMateriProgress;
use App\Models\QuizResult;
use App\Models\CourseEnrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class KelasSelesaiController extends Controller
{
    /**
     * Tampilkan halaman Kelas Selesai
     */
    public function index()
    {
        $user = Auth::user();

        // Ambil semua kelas yang user sudah selesaikan semua materi
        $kelasList = Kelas::with('materis')
            ->where('status', 'published')
            ->get()
            ->filter(function ($kelas) use ($user) {
                $materiIds = $kelas->materis->pluck('id');
                $completedMateriCount = UserMateriProgress::where('user_id', $user->id)
                    ->whereIn('materi_id', $materiIds)
                    ->where('status', 'completed')
                    ->count();

                return $completedMateriCount == $materiIds->count();
            });

        // Total kelas selesai
        $totalCompletedKelas = $kelasList->count();

        // Ambil semua materi dari kelas selesai
        $materiIds = $kelasList->pluck('materis')->flatten()->pluck('id');

        // Ambil skor quiz tertinggi user
        $highestScore = QuizResult::where('user_id', $user->id)
            ->whereIn('quiz_id', function($query) use ($materiIds) {
                $query->select('id')
                    ->from('quizzes')
                    ->whereIn('materi_id', $materiIds);
            })
            ->max('score');


        // Rata-rata score quiz dari semua materi yang sudah selesai
        // $averageScore = $kelasList->avg(function($kelas) use ($user) {
        //     $materiIds = $kelas->materis->pluck('id');
        //     return QuizResult::where('user_id', $user->id)
        //         ->whereHas('quiz.materi', function($q) use ($materiIds) {
        //             $q->whereIn('id', $materiIds);
        //         })
        //         ->avg('score') ?? 0;
        // });

        // Total siswa per kelas
        $kelasList->transform(function($kelas) {
        $kelas->total_siswa = CourseEnrollment::where('kelas_id', $kelas->id)->count();
        return $kelas;
        });

        return view('desktop.pages.kelas.kelas-selesai', [
            'kelasList' => $kelasList,
            'totalCompletedKelas' => $totalCompletedKelas,
            // 'averageScore' => round($averageScore, 1),
            'highestScore' => $highestScore,
        ]);
    }
}

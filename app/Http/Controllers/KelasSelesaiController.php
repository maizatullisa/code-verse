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

    public function index()
    {
        $user = Auth::user();

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

        $totalCompletedKelas = $kelasList->count();

        $materiIds = $kelasList->pluck('materis')->flatten()->pluck('id');

        $highestScore = QuizResult::where('user_id', $user->id)
            ->whereIn('quiz_id', function($query) use ($materiIds) {
                $query->select('id')
                    ->from('quizzes')
                    ->whereIn('materi_id', $materiIds);
            })
            ->max('score');

        $kelasList->transform(function($kelas) {
        $kelas->total_siswa = CourseEnrollment::where('kelas_id', $kelas->id)->count();
        return $kelas;
        });

        return view('desktop.pages.kelas.kelas-selesai', [
            'kelasList' => $kelasList,
            'totalCompletedKelas' => $totalCompletedKelas,
            'highestScore' => $highestScore,
        ]);
    }
}

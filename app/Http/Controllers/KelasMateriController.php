<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;
use App\Models\QuizResult;
use App\Models\UserMateriProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasMateriController extends Controller
{

public function showCourseMateri($kelasId, $materiId = null)
{
    $kelas = Kelas::with(['materis.quiz.questions', 'pengajar'])
                  ->where('status', 'published')
                  ->findOrFail($kelasId);

    $materis = $kelas->materis->where('status', 'published')->sortBy('created_at')->values();

    $user = Auth::user();
    $progressData = UserMateriProgress::where('user_id', $user->id)->get()->keyBy('materi_id');

    $materiPerMinggu = 4;

    $currentMateri = null;
    if ($materiId) {
        $currentMateri = $materis->firstWhere('id', $materiId);
    }
    
    if (!$currentMateri) {
        //cari materi pertama yang belum selesai
        foreach ($materis as $materi) {
            if (!$progressData->has($materi->id) || $progressData[$materi->id]->status !== 'completed') {
                $currentMateri = $materi;
                break;
            }
        }
        $currentMateri = $currentMateri ?? $materis->first();
    }

    //pastikan user bisa akses materi ini
    if ($currentMateri && $materiId) {
        $canAccess = $this->canAccessMateri($currentMateri, $materis, $progressData);
        if (!$canAccess) {
            return redirect()->route('student.course.materi', [$kelasId])
                            ->with('error', 'Anda harus menyelesaikan materi sebelumnya terlebih dahulu.');
        }
    }
    
    //hitng navigation data
    $currentIndex = $materis->search(fn($m) => $m->id == ($currentMateri->id ?? 0));
    $hasNext = $currentIndex !== false && isset($materis[$currentIndex + 1]);
    $hasPrevious = $currentIndex > 0;
    $nextMateri = $hasNext ? $materis[$currentIndex + 1] : null;
    $prevMateri = $hasPrevious ? $materis[$currentIndex - 1] : null;

    // Hitung minggu berdasarkan currentMateri (gunakan variable terpisah)
    $weekIndex = $materis->search(function ($materi) use ($currentMateri) {
        return $materi->id == $currentMateri->id;
    });
    
    $currentWeek = floor($weekIndex / $materiPerMinggu);
    $weekNumber = $currentWeek + 1;

    $startIndex = $currentWeek * $materiPerMinggu;
    $materiMingguIni = $materis->slice($startIndex, $materiPerMinggu)->values();

    $currentQuiz = $currentMateri?->quiz;

    $totalMateri = $materis->count();
    $totalQuiz = $materis->filter(function($materi) {
        return $materi->quiz !== null;
    })->count();
    $totalItems = $totalMateri + $totalQuiz;

    $materiIds = $materis->pluck('id');
    $progressData = UserMateriProgress::where('user_id', $user->id)
                                    ->whereIn('materi_id', $materiIds)
                                    ->get()
                                    ->keyBy('materi_id');

    $completedMateri = $progressData->where('status', 'completed')->count();

    $passedQuiz = QuizResult::where('user_id', $user->id)
        ->whereHas('quiz.materi.kelas', function($q) use ($kelas) {
            $q->where('id', $kelas->id);
        })
        ->where('passed', true)
        ->distinct('quiz_id')
        ->count('quiz_id');


        $completedCount = $completedMateri + $passedQuiz;
        $progressPercentage = $totalItems > 0 ? round(($completedCount / $totalItems) * 100) : 0;
        $progressPercentage = $totalItems > 0 
            ? min(100, round(($completedCount / $totalItems) * 100))
            : 0;

        $isCompleted = false;
        if ($currentMateri && $progressData->has($currentMateri->id)) {
            $isCompleted = $progressData[$currentMateri->id]->status === 'completed';
        }

        $allMateriCompleted = $materis->every(fn($materi) =>
            $progressData->has($materi->id) && $progressData[$materi->id]->status === 'completed'
        );

      $materiWithQuiz = $materis->filter(function($materi) {
    return $materi->quiz !== null;
});

$allQuizPassed = false;
if ($materiWithQuiz->count() > 0) {
    $allQuizPassed = $materiWithQuiz->every(function($materi) use ($user) {
        $maxScore = QuizResult::where('user_id', $user->id)
                            ->where('quiz_id', $materi->quiz->id)
                            ->max('score');
        
        return $maxScore !== null && $maxScore >= 70; // BENAR!
    });
}

$canGraduate = $allQuizPassed; // BENAR!

// Debug langsung sebelum return view
// dd([
//     'user_id' => $user->id,
//     'kelas_id' => $kelas->id,
//     'total_materis' => $materis->count(),
//     'materiWithQuiz_count' => $materiWithQuiz->count(),
//     'allQuizPassed' => $allQuizPassed,
//     'canGraduate' => $canGraduate,
//     'quiz_results' => QuizResult::where('user_id', $user->id)->get()->toArray()
// ]);

        return view('desktop.pages.kelas.kelas-materi', compact(
            'kelas',
            'currentMateri',
            'currentQuiz',
            'totalMateri',
            'completedCount',
            'progressPercentage',
            'materiMingguIni',
            'weekNumber',
            'progressData',
            'isCompleted',
            'hasNext',
            'hasPrevious',
            'nextMateri',
            'prevMateri',
            'canGraduate'
        ));
    }
    

    ///========submit======//
public function submitQuiz(Request $request, $quizId)
{
    $user = Auth::user();
    
    $quiz = Quiz::with('questions', 'materi.kelas')->findOrFail($quizId);

    $answers = $request->input('answers', []);
    $totalQuestions = $quiz->questions->count();
    $correctCount = 0;

    foreach ($quiz->questions as $question) {
        $userAnswer = $answers[$question->id] ?? null;
        if ($userAnswer && strtolower($userAnswer) === strtolower($question->jawaban_benar)) {
            $correctCount++;
        }
    }

    $score = round(($correctCount / $totalQuestions) * 100);
    $passed = $score >= 70;

    QuizResult::create([
        'user_id' => $user->id,
        'quiz_id' => $quiz->id,
        'score' => $score,
        'passed' => $passed,
    ]);

    return view('desktop.pages.kelas.kelas-hasil-quiz', [
        'score' => $score,
        'correctCount' => $correctCount,
        'totalQuestions' => $totalQuestions,
        'quiz' => $quiz,
        'answers' => $answers,
        'kelas' => $quiz->materi->kelas,
        'materi' => $quiz->materi,
    ]);
}

////=====================////////////////////////////////////////////////////

public function markComplete(Request $request, $kelasId, $materiId)
{
    $user = Auth::user();
    $materi = Materi::with('quiz')->where('id', $materiId)
                   ->whereHas('kelas', fn($q) => $q->where('id', $kelasId))
                   ->findOrFail($materiId);
    
    // VALIDASI WAJIB: Jika materi ada quiz, user HARUS lulus quiz dulu!
    if ($materi->quiz) {
        $quizResult = QuizResult::where('user_id', $user->id)
                               ->where('quiz_id', $materi->quiz->id)
                               ->where('passed', true) // Harus lulus (score >= 70)
                               ->first();
        
        if (!$quizResult) {
            return redirect()->back()
                           ->with('error', 'Anda harus menyelesaikan quiz dengan nilai minimal 70 terlebih dahulu sebelum dapat menandai materi sebagai selesai!');
        }
    }

    UserMateriProgress::updateOrCreate(
        ['user_id' => $user->id, 'materi_id' => $materiId],
        ['status' => 'completed', 'completed_at' => now()]
    );
    
    $kelas = $materi->kelas;
    $materis = $kelas->materis->where('status', 'published')->sortBy('created_at')->values();
    
    $currentIndex = $materis->search(fn($m) => $m->id == $materiId);
    $nextMateri = $materis->get($currentIndex + 1);

    if ($nextMateri) {
        return redirect()->route('student.course.materi', [$kelas->id, $nextMateri->id])
                        ->with('success', 'Materi berhasil diselesaikan!');
    } else {
        return redirect()->route('student.course.completed', $kelas->id)
                        ->with('success', 'Selamat! Anda telah menyelesaikan semua materi!');
    }
}

public function nextMateri($kelasId, $currentMateriId)
{
    $kelas = Kelas::findOrFail($kelasId);
    $materis = $kelas->materis->where('status', 'published')->sortBy('created_at')->values();
    
    $currentIndex = $materis->search(fn($m) => $m->id == $currentMateriId);
    $nextMateri = $materis->get($currentIndex + 1);
    
    if ($nextMateri) {
        return redirect()->route('student.course.materi', [$kelasId, $nextMateri->id]);
    }
    
    return redirect()->back()->with('info', 'Ini adalah materi terakhir.');
}

public function previousMateri($kelasId, $currentMateriId)
{
    $kelas = Kelas::findOrFail($kelasId);
    $materis = $kelas->materis->where('status', 'published')->sortBy('created_at')->values();
    
    $currentIndex = $materis->search(fn($m) => $m->id == $currentMateriId);
    $prevMateri = $materis->get($currentIndex - 1);
    
    if ($prevMateri) {
        return redirect()->route('student.course.materi', [$kelasId, $prevMateri->id]);
    }
    
    return redirect()->back()->with('info', 'Ini adalah materi pertama.');
}

// public function courseCompleted($kelasId)
// {
//     $kelas = Kelas::findOrFail($kelasId);
//     $user = Auth::user();
    
//     //untuk veryfy complete
//     $totalMateri = $kelas->materis->where('status', 'published')->count();
//     $completedMateri = UserMateriProgress::where('user_id', $user->id)
//         ->whereHas('materi', function($query) use ($kelas) {
//             $query->where('kelas_id', $kelas->id)->where('status', 'published');
//         })
//         ->where('status', 'completed')
//         ->count();
    
//     if ($completedMateri < $totalMateri) {
//         return redirect()->route('student.course.materi', $kelasId)
//                         ->with('error', 'Anda belum menyelesaikan semua materi.');
//     }
    
//     return view('desktop.pages.kelas.kelas-selesai', compact('kelas', 'kelasList'));
// }

public function courseCompleted($kelasId)
{
    $kelas = Kelas::findOrFail($kelasId);
    $user = Auth::user();
    
    // Cek apakah semua materi sudah selesai
    $totalMateri = $kelas->materis->where('status', 'published')->count();
    $completedMateri = UserMateriProgress::where('user_id', $user->id)
        ->whereHas('materi', function($query) use ($kelas) {
            $query->where('kelas_id', $kelas->id)->where('status', 'published');
        })
        ->where('status', 'completed')
        ->count();
    
    if ($completedMateri < $totalMateri) {
        return redirect()->route('student.course.materi', $kelasId)
                        ->with('error', 'Anda belum menyelesaikan semua materi.');
    }

    //Ambil semua kelas yang sudah selesai oleh u
        $kelasList = Kelas::whereHas('materis', function($q) use ($user) {
            $q->whereHas('userProgress', function($q2) use ($user) {
                $q2->where('user_id', $user->id)
                ->where('status', 'completed');
            });
        })->get();

    return view('desktop.pages.kelas.kelas-selesai', compact('kelas', 'kelasList'));
}

private function canAccessMateri($currentMateri, $materis, $progressData)
{
    $currentIndex = $materis->search(fn($m) => $m->id == $currentMateri->id);
    
    // Materi pertama selalu bisa diakses
    if ($currentIndex == 0) {
        return true;
    }

    // Cek apakah materi sebelumnya sudah completed
    $prevMateri = $materis[$currentIndex - 1];
    return $progressData->has($prevMateri->id) && 
           $progressData[$prevMateri->id]->status === 'completed';
}

}
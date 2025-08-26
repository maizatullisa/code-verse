<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\UserMateriProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasMateriController extends Controller
{
    /**
     * Tampilkan halaman pembelajaran siswa
     */
//     public function showCourseMateri($kelasId, $materiId = null)
// {
//     $kelas = Kelas::with(['materis.quiz', 'pengajar'])
//                   ->where('status', 'published')
//                   ->findOrFail($kelasId);

//     $materis = $kelas->materis->where('status', 'published')->sortBy('created_at')->values();

//     $user = Auth::user();
//     $progressData = UserMateriProgress::where('user_id', $user->id)->get()->keyBy('materi_id');

//     $totalMateri = $materis->count();
//     $materiPerMinggu = 4; // jumlah materi per minggu

//     $currentWeek = 0; // minggu default = 0 (minggu pertama)

//     if ($materiId) {
//         $currentIndex = $materis->search(function ($materi) use ($materiId) {
//             return $materi->id == $materiId;
//         });

//         $currentWeek = floor($currentIndex / $materiPerMinggu); // hitung minggu berdasarkan index
//     }

//     $startIndex = $currentWeek * $materiPerMinggu;
//     $materiMingguIni = $materis->slice($startIndex, $materiPerMinggu)->values(); // ambil 4 materi minggu ini

//     $currentMateri = $materiMingguIni->first();

//     $currentQuiz = $currentMateri?->quiz;

//     $completedCount = $progressData->where('status', 'completed')->count();
//     $progressPercentage = $totalMateri > 0 ? round(($completedCount / $totalMateri) * 100) : 0;

//     //mark complet
//     $isCompleted = false;

//     if ($currentMateri && $progressData->has($currentMateri->id)) {
//         $isCompleted = $progressData[$currentMateri->id]->status === 'completed';
//     }

//     return view('desktop.pages.kelas.kelas-materi', compact(
//         'kelas',
//         'currentMateri',
//         'currentQuiz',
//         'totalMateri',
//         'completedCount',
//         'progressPercentage',
//         'materiMingguIni', // data 4 materi minggu ini
//         'currentWeek',
//         'progressData',
//         'isCompleted'
//     ));
// }

public function showCourseMateri($kelasId, $materiId = null)
{
    $kelas = Kelas::with(['materis.quiz', 'pengajar'])
                  ->where('status', 'published')
                  ->findOrFail($kelasId);

    $materis = $kelas->materis->where('status', 'published')->sortBy('created_at')->values();

    $user = Auth::user();
    $progressData = UserMateriProgress::where('user_id', $user->id)->get()->keyBy('materi_id');

    $totalMateri = $materis->count();
    $materiPerMinggu = 4;

    // Fix: Pilih materi berdasarkan materiId atau materi pertama yang belum selesai
    $currentMateri = null;
    if ($materiId) {
        $currentMateri = $materis->firstWhere('id', $materiId);
    }
    
    if (!$currentMateri) {
        // Cari materi pertama yang belum selesai
        foreach ($materis as $materi) {
            if (!$progressData->has($materi->id) || $progressData[$materi->id]->status !== 'completed') {
                $currentMateri = $materi;
                break;
            }
        }
        $currentMateri = $currentMateri ?? $materis->first();
    }

    // Hitung minggu berdasarkan currentMateri
    $currentIndex = $materis->search(function ($materi) use ($currentMateri) {
        return $materi->id == $currentMateri->id;
    });
    
    $currentWeek = floor($currentIndex / $materiPerMinggu);
    $weekNumber = $currentWeek + 1;

    $startIndex = $currentWeek * $materiPerMinggu;
    $materiMingguIni = $materis->slice($startIndex, $materiPerMinggu)->values();

    $currentQuiz = $currentMateri?->quiz;

    $completedCount = $progressData->where('status', 'completed')->count();
    $progressPercentage = $totalMateri > 0 ? round(($completedCount / $totalMateri) * 100) : 0;

    $isCompleted = false;
    if ($currentMateri && $progressData->has($currentMateri->id)) {
        $isCompleted = $progressData[$currentMateri->id]->status === 'completed';
    }

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
        'isCompleted'
    ));
}
    /**
     * Submit quiz answer
     */
    public function submitQuiz(Request $request, $quizId)
    {
        $quiz = Quiz::with('questions')->findOrFail($quizId);

        $answers = $request->input('answers', []);
        $score = 0;
        $totalQuestions = $quiz->questions->count();

        foreach ($quiz->questions as $question) {
            $userAnswer = $answers[$question->id] ?? null;

            if ($question->tipe_soal === 'pilihan_ganda') {
                if ($userAnswer === $question->jawaban_benar) {
                    $score++;
                }
            } elseif ($question->tipe_soal === 'isian') {
                // Simple string comparison untuk isian
                if (strtolower(trim($userAnswer)) === strtolower(trim($question->jawaban_isian))) {
                    $score++;
                }
            }
        }

        $percentage = $totalQuestions > 0 ? round(($score / $totalQuestions) * 100) : 0;

        // TODO: Simpan hasil ke tabel user_quiz_results

        return response()->json([
            'success' => true,
            'score' => $score,
            'total' => $totalQuestions,
            'percentage' => $percentage,
            'passed' => $percentage >= 70 // Minimal 70% untuk lulus
        ]);
    }

    /**
     * Tandai materi sudah selesai
     */
    // public function markComplete(Request $request, $materiId)
    // {
    //     $user = Auth::user();

    //     $existing = \App\Models\UserMateriProgress::updateOrCreate(
    //         [
    //             'user_id' => $user->id,
    //             'materi_id' => $materiId
    //         ],
    //         [
    //             'status' => 'completed',
    //             'completed_at' => now()
    //         ]
    //     );

    //     return response()->json(['success' => true]);
    // }
    public function markComplete(Request $request, $materiId)
{
    $user = Auth::user();
    $materi = Materi::findOrFail($materiId);
    
    // Mark materi as completed
    $progress = UserMateriProgress::updateOrCreate(
        [
            'user_id' => $user->id,
            'materi_id' => $materiId
        ],
        [
            'status' => 'completed',
            'completed_at' => now()
        ]
    );
    
    // Check if all materials in this class are completed
    $kelas = $materi->kelas;
    $totalMateri = $kelas->materis->where('status', 'published')->count();
    $completedMateri = UserMateriProgress::where('user_id', $user->id)
        ->whereHas('materi', function($query) use ($kelas) {
            $query->where('kelas_id', $kelas->id)->where('status', 'published');
        })
        ->where('status', 'completed')
        ->count();
    
    $courseCompleted = ($completedMateri >= $totalMateri);
    
    return response()->json([
        'success' => true,
        'course_completed' => $courseCompleted,
        'completed_count' => $completedMateri,
        'total_count' => $totalMateri
    ]);
}


    /**
     * Ambil materi berikutnya dalam urutan
     */
    public function getNextMateri($kelasId, $currentMateriId)
    {
        $kelas = Kelas::with('materis')->findOrFail($kelasId);
        $materis = $kelas->materis->where('status', 'published')->sortBy('created_at')->values();

        $currentIndex = null;
        foreach ($materis as $index => $materi) {
            if ($materi->id == $currentMateriId) {
                $currentIndex = $index;
                break;
            }
        }

        if ($currentIndex !== null && isset($materis[$currentIndex + 1])) {
            $nextMateri = $materis[$currentIndex + 1];
            return response()->json([
                'has_next' => true,
                'next_materi_id' => $nextMateri->id,
                'next_materi_judul' => $nextMateri->judul
            ]);
        }

        return response()->json(['has_next' => false]);
    }

    /**
     * Load materi content via AJAX
     */
    public function loadMateriContent($materiId)
    {
        
        $materi = Materi::with('quiz.questions')->findOrFail($materiId);

        $content = [
            'id' => $materi->id,
            'judul' => $materi->judul,
            'deskripsi' => $materi->deskripsi,
            'rangkuman' => $materi->rangkuman,
            'file_path' => $materi->file_path,
            'file_url' => $materi->file_path ? asset('storage/' . $materi->file_path) : null,
            'has_quiz' => $materi->quiz ? true : false,
            'quiz' => null
        ];

        if ($materi->quiz) {
            $content['quiz'] = [
                'id' => $materi->quiz->id,
                'judul' => $materi->quiz->judul,
                'deskripsi' => $materi->quiz->deskripsi,
                'questions' => $materi->quiz->questions->map(function ($q) {
                    return [
                        'id' => $q->id,
                        'pertanyaan' => $q->pertanyaan,
                        'tipe_soal' => $q->tipe_soal,
                        'options' => $q->tipe_soal === 'pilihan_ganda' ? [
                            'a' => $q->pilihan_a,
                            'b' => $q->pilihan_b,
                            'c' => $q->pilihan_c,
                            'd' => $q->pilihan_d,
                        ] : null
                    ];
                })
            ];
        }

         return view('desktop.pages.kelas.kelas-materi', compact('materi'));
    }

    private function getFileType($filePath)
    {
        if (!$filePath) return 'text';

        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        return match ($extension) {
            'mp4', 'avi', 'mkv' => 'video',
            'pdf' => 'article',
            'doc', 'docx', 'ppt', 'pptx' => 'document',
            default => 'text',
        };
    }


            public function apiGetMateri($kelasId)
        {
            $kelas = Kelas::with(['materis.quiz'])->findOrFail($kelasId);
            $materis = $kelas->materis->where('status', 'published')->sortBy('created_at')->values();

            $user = Auth::user();
            $progressData = UserMateriProgress::where('user_id', $user->id)->pluck('status', 'materi_id');

            $data = $materis->map(function ($materi, $index) use ($progressData, $materis) {
                $fileType = $this->getFileType($materi->file_path);
                $isCompleted = $progressData->get($materi->id) === 'completed';

                // Materi pertama tidak dikunci
                $isLocked = $index > 0 && !$progressData->get($materis[$index - 1]->id);

                return [
                    'id' => $materi->id,
                    'title' => $materi->judul,
                    'type' => $fileType,
                    'duration' => $materi->durasi,
                    'week' => $materi->minggu ?? 1,
                    'weekTitle' => 'Minggu ' . ($materi->minggu ?? 1),
                    'completed' => $isCompleted,
                    'locked' => $isLocked,
                    'content' => [
                        'videoUrl' => in_array($fileType, ['video']) ? asset('storage/' . $materi->file_path) : null,
                        'text' => $materi->deskripsi,
                        'pdfUrl' => $fileType === 'article' ? asset('storage/' . $materi->file_path) : null,
                        'description' => $materi->deskripsi,
                        'questions' => $materi->quiz ? $materi->quiz->questions->count() : null
                    ]
                ];
            });

            return response()->json([
                'materials' => $data
            ]);
        }



}




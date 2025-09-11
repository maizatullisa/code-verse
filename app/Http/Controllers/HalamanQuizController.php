<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;

class HalamanQuizController extends Controller
{
    /**
     * Tampilkan halaman detail quiz untuk siswa.
     */
    public function show($quizId)
    {
        // Ambil quiz lengkap beserta semua soalnya
        $quiz = Quiz::with(['materi', 'questions'])
            ->where('status', 'aktif')
            ->findOrFail($quizId);

        return view('pengajar.quiz.halaman-quiz-pengajar', [
            'quiz' => $quiz,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;

class HalamanQuizController extends Controller
{
    public function show($quizId)
    {
       
        $quiz = Quiz::with(['materi', 'questions'])
            ->where('status', 'aktif')
            ->findOrFail($quizId);

        return view('pengajar.quiz.halaman-quiz-pengajar', [
            'quiz' => $quiz,
        ]);
    }
}

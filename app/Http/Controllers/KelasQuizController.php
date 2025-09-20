<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;
use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Http\Request;

class KelasQuizController extends Controller
{

    public function tampilQuiz($kelasId, $materiId)
{
    $kelas = Kelas::findOrFail($kelasId);
    $materi = Materi::findOrFail($materiId);
    $quiz = $materi->quiz; 

    if (!$quiz) {
        return redirect()->route('student.course.materi', [$kelasId, $materiId])
            ->with('error', 'Quiz belum tersedia untuk materi ini.');
    }

    $questions = $quiz->questions()->with(['answers'])->get();

    return view('desktop.pages.kelas.kelas-quiz', compact('kelas', 'materi', 'quiz', 'questions'));
}

   
}

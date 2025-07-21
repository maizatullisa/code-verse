<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Materi;
use App\Models\QuizQuestion;
use App\Models\QuizOption;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes= Quiz::with('materi')->get();
        return view('quiz', compact('quizzes'));
    }

    //simpan quiz baru dengan 10 pertanyaan DAN masing2 4 pilihan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'questions' => 'required|array|size:10',
            'questions.*.text' => 'required|string',
            'questions.*.options' => 'required|array|size:4',
            'questions.*.options.*.text' => 'required|string',
            'questions.*.correct_option' => 'required|integer|min:0|max:3', // 0-3 index dari 4 opsi
        ]);

        $quiz = Quiz::create([
            'materi_id' => $validated['materi_id'],
        ]);

        
        foreach ($validated['questions'] as $q) {
            $question = QuizQuestion::create([
                'quiz_id' => $quiz->id,
                'question_text' => $q['text'],
            ]);

            foreach ($q['options'] as $index => $option) {
                QuizOption::create([
                    'question_id' => $question->id,
                    'option_text' => $option['text'],
                    'is_correct' => ($index === $q['correct_option']),
                ]);
            }
        }
        return redirect()->back()->with('success', 'Kuis berhasil ditambahkan');
    }
    // Tampilkan quiz detail berdasarkan materi
    public function showByMateri($materiId)
    {
        $quiz = Quiz::with('questions.answerOptions')->where('materi_id', $materiId)->firstOrFail();
        return view('quiz', compact('quiz'));
    }
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->questions()->each(function ($question) {
        $question->answerOptions()->delete();
        });
        $quiz->questions()->delete();
        $quiz->delete();

        return redirect()->back()->with('success', 'Kuis berhasil dihapus');
    }

        public function submit(Request $request, $quizId)
    {
        $quiz = Quiz::with('questions.answerOptions')->findOrFail($quizId);

        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|exists:quiz_options,id',
        ]);

        foreach ($validated['answers'] as $questionId => $selectedOptionId) {
            QuizAnswer::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'quiz_id' => $quiz->id,
                    'question_id' => $questionId,
                ],
                [
                    'selected_option_id' => $selectedOptionId,
                ]
            );
        }

       
    // Hitung skor langsung
    $score = 0;
    foreach ($quiz->questions as $question) {
        $selected = $validated['answers'][$question->id] ?? null;
        $correctOption = $question->answerOptions->firstWhere('is_correct', true);
        if ($correctOption && $selected == $correctOption->id) {
            $score++;
        }
    }

    return redirect()->back()->with([
        'success' => 'Jawaban kamu berhasil dikumpulkan!',
        'score' => $score,
        'total' => $quiz->questions->count()
    ]);
    }

            public function results($quizId)
        {
            $quiz = Quiz::with(['questions.answerOptions', 'answers.user'])->findOrFail($quizId);

            // Kelompokkan jawaban berdasarkan siswa
            $grouped = $quiz->answers->groupBy('user_id');

            $results = [];

            foreach ($grouped as $userId => $answers) {
                $user = $answers->first()->user;
                $score = 0;

                foreach ($quiz->questions as $question) {
                    $answer = $answers->firstWhere('question_id', $question->id);
                    $correct = $question->answerOptions->firstWhere('is_correct', true);

                    if ($answer && $correct && $answer->selected_option_id == $correct->id) {
                        $score++;
                    }
                }

                $results[] = [
                    'user' => $user,
                    'score' => $score,
                    'total' => $quiz->questions->count(),
                ];
            }

            return view('quiz.results', compact('quiz', 'results'));
        }


}   

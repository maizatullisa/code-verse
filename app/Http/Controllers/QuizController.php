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
        // Menampilkan semua quiz milik pengajar saat ini
        $quizzes = Quiz::where('pengajar_id', Auth::id())->withCount('questions')->get();

        return view('pengajar.buat-quiz-pengajar', compact('quizzes'));
    }

    public function create()
    {
        return view('pengajar.buat-quiz-pengajar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $quiz = Quiz::create([
            'pengajar_id' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Quiz berhasil dibuat.');
    }

    public function addQuestion(Request $request, $quizId)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'tipe' => 'required|in:pilihan_ganda,isian',
            'opsi.*.jawaban' => 'required_if:tipe,pilihan_ganda',
        ]);

        $question = QuizQuestion::create([
            'quiz_id' => $quizId,
            'pertanyaan' => $request->pertanyaan,
            'tipe' => $request->tipe,
        ]);

        if ($request->tipe === 'pilihan_ganda' && $request->has('opsi')) {
            foreach ($request->opsi as $opsi) {
                QuizOption::create([
                    'question_id' => $question->id,
                    'jawaban' => $opsi['jawaban'],
                    'is_correct' => isset($opsi['is_correct']) ? true : false,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $quiz = Quiz::where('id', $id)->where('pengajar_id', Auth::id())->firstOrFail();
        $quiz->delete();

        return redirect()->back()->with('success', 'Quiz berhasil dihapus.');
    }

}   

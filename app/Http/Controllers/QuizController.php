<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Materi;
use App\Models\QuizQuestion;
use App\Models\QuizOption;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
       public function index()
    {
        // Menampilkan semua quiz milik pengajar saat ini
        $quizzes = Quiz::where('pengajar_id', Auth::id())->withCount('questions')->get();
        

        return view('pengajar.buat-quiz-pengajar', compact('quizzes'));
    }

    public function create($materi)
    {
       $materi = Materi::find($materi);
        return view('pengajar.quiz.buat-quiz-pengajar', compact('materi'));
    }

    public function store(Request $request)
    {
        // $quizzes = Quiz::where('pengajar_id', Auth::id())->withCount('questions')->get();

       $quiz = Quiz::create([
            'materi_id'     => $request->materi_id,
            'judul'         => $request->judul,
            'deskripsi'     => $request->deskripsi,
            'jumlah_soal'   => $request->jumlah_soal,
            'tipe_soal'     => $request->tipe_soal,
            'status'        => $request->status,
        ]);

        return redirect()->route('pengajar.quiz.question.create', ['quiz_id' => $quiz->id]);

    }

    public function createQuizQuestion($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        return view('pengajar.quiz.buat-soal-quiz-pengajar', compact('quiz'));
    }

    public function storeQuestion(Request $request)
    {
        $soalData = json_decode($request->soal_data, true);

        foreach ($soalData as $nomor => $soal) {
            QuizQuestion::create([
                'quiz_id' => $request->quiz_id,
                'pertanyaan' => $soal['pertanyaan'],
                'tipe_soal' => $soal['tipe_soal'],
                'pilihan_a' => $soal['pilihan_a'] ?? null,
                'pilihan_b' => $soal['pilihan_b'] ?? null,
                'pilihan_c' => $soal['pilihan_c'] ?? null,
                'pilihan_d' => $soal['pilihan_d'] ?? null,
                'jawaban_benar' => $soal['jawaban_benar'] ?? null,
                'jawaban_isian' => $soal['jawaban_isian'] ?? null,
                'nomor_soal' => (int) $nomor,
            ]);
        }

        return redirect()->route('pengajar.quiz.listquiz');
    }

    public function listQuiz()
    {   
        $data = [
            'total_soal'        => QuizQuestion::count(),
            'total_quiz'        => Quiz::count(),
            'total_quiz_aktif'  => Quiz::where('status', 'aktif')->count(),
            'quizzes'           => Quiz::latest()->get(),
        ];
        return view('pengajar.quiz.index-quiz-pengajar', $data);
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

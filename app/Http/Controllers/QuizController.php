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
                // 'jawaban_isian' => $soal['jawaban_isian'] ?? null,
                'nomor_soal' => (int) $nomor,
            ]);
        }
         $quiz = Quiz::with('materi')->find($request->quiz_id);
         $kelasId = $quiz->materi->kelas_id;

        return redirect()->route('pengajar.quiz.listquiz', ['kelas' => $kelasId]);
    }

    //=====menampilkan semua quiz pengajar semua kelas
//     public function listQuiz()
// {
//     $pengajarId = auth()->id(); 

//     $data = [
//         //total soal dari quiz milik pengajer
//         'total_soal' => QuizQuestion::whereHas('quiz.materi', function ($query) use ($pengajarId) {
//             $query->where('pengajar_id', $pengajarId);
//         })->count(),

//         'total_quiz' => Quiz::whereHas('materi', function ($query) use ($pengajarId) {
//             $query->where('pengajar_id', $pengajarId);
//         })->count(),

//         // quiz aktif dari pengajar??? ad brp
//         'total_quiz_aktif' => Quiz::where('status', 'aktif')
//             ->whereHas('materi', function ($query) use ($pengajarId) {
//                 $query->where('pengajar_id', $pengajarId);
//             })->count(),

//         'quizzes' => Quiz::whereHas('materi', function ($query) use ($pengajarId) {
//                 $query->where('pengajar_id', $pengajarId);
//             })
//             ->with('materi') 
//             ->latest()
//             ->get(),
//     ];

//     return view('pengajar.quiz.index-quiz-pengajar', $data);
// }

//==menampilkan semua quiz dalam satu kelas
    public function listQuiz($kelasId)
    {
        $pengajarId = auth()->id(); 

        $data = [
            'total_soal' => QuizQuestion::whereHas('quiz.materi', function ($query) use ($pengajarId, $kelasId) {
                $query->where('pengajar_id', $pengajarId)
                    ->where('kelas_id', $kelasId);
            })->count(),

            'total_quiz' => Quiz::whereHas('materi', function ($query) use ($pengajarId, $kelasId) {
                $query->where('pengajar_id', $pengajarId)
                    ->where('kelas_id', $kelasId);
            })->count(),

            'total_quiz_aktif' => Quiz::where('status', 'aktif')
                ->whereHas('materi', function ($query) use ($pengajarId, $kelasId) {
                    $query->where('pengajar_id', $pengajarId)
                        ->where('kelas_id', $kelasId);
                })->count(),

            'quizzes' => Quiz::whereHas('materi', function ($query) use ($pengajarId, $kelasId) {
                    $query->where('pengajar_id', $pengajarId)
                        ->where('kelas_id', $kelasId);
                })
                ->with(['materi', 'questions'])
                ->latest()
                ->get(),

            'kelas_id' => $kelasId,
        ];

        return view('pengajar.quiz.index-quiz-pengajar', $data);
    }

    public function addQuestion(Request $request, $quizId)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'tipe' => 'required|in:pilihan_ganda',
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

        public function destroy($quizId)
        {
            // Cari quiz
            $quiz = Quiz::with('questions')->findOrFail($quizId);

            // Hapus semua soal terkait
            $quiz->questions()->delete();

            // Hapus quiz
            $quiz->delete();

            $kelasId = $quiz->materi->kelas_id;

            return redirect()->route('pengajar.quiz.listquiz', ['kelas' => $kelasId])
                ->with('success', 'Quiz beserta semua soal berhasil dihapus.');
        }

            public function publish($quizId)
    {
        $quiz = Quiz::where('id', $quizId)
            ->whereHas('materi', function ($query) {
                $query->where('pengajar_id', auth()->id());
            })
            ->firstOrFail();

        $quiz->status = 'aktif';
        $quiz->save();

        return redirect()->back()->with('success', 'Quiz berhasil dipublish.');
    }

}

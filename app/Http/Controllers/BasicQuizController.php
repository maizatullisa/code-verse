<?php

namespace App\Http\Controllers;

use App\Models\BasicQuizQuestion;
use App\Models\BasicQuizAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicQuizController extends Controller
{
    public function show($number)
    {
        $question = BasicQuizQuestion::where('number', $number)->firstOrFail();
        return view('quiz.basic-quiz-'.$number, compact('question'));
    }

    public function submit(Request $request, $number)
    {
        $request->validate([
            'answer' => 'required|in:A,B,C,D',
        ]);

        $question = BasicQuizQuestion::where('number', $number)->firstOrFail();

        BasicQuizAnswer::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'basic_quiz_question_id' => $question->id,
            ],
            ['answer' => $request->answer]
        );

        return redirect()->route('basic.quiz.show', $number + 1);
    }
}
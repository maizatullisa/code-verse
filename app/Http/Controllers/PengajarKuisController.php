<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class PengajarKuisController extends Controller
{

public function index()
{
    $quiz = Quiz::where('pengajar_id', auth()->id())->get();
    return view('pengajar.quiz.quiz-pengajar', compact('quiz'));
}

}

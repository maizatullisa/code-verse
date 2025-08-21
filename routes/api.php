<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/courses/{id}/materials', function ($id) {
    $course = \App\Models\Course::with('materials')->findOrFail($id);

    return response()->json([
        'id' => $course->id,
        'title' => $course->title,
        'instructor' => $course->instructor->name ?? 'N/A',
        'materials' => $course->materials->map(function ($m) {
            return [
                'id' => $m->id,
                'title' => $m->title,
                'type' => $m->type,
                'duration' => $m->duration,
                'week' => $m->week,
                'weekTitle' => $m->week_title,
                'completed' => false,
                'locked' => $m->locked ?? false,
                'content' => [
                    'videoUrl' => $m->video_url,
                    'description' => $m->description,
                    'text' => $m->text,
                    'questions' => $m->questions_count,
                ]
            ];
        })
    ]);
});

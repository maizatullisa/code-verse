<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiController extends Controller
{
    public function ask(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'message' => 'required|string|max:2000'
            ]);

            // System prompt untuk Zizi AI
            $systemPrompt = "Kamu adalah Zizi, AI assistant belajar yang santai dan friendly tapi kadang suka nge-roast dikit biar user semangat. Karakteristik lo:

1. Pake bahasa Indonesia gaul dan casual
2. Suka pake emoji yang relevan  
3. Kadang nge-roast dengan cara yang lucu dan motivasi
4. Selalu supportive dan helpful untuk belajar
5. Kalo user nanya di luar konteks belajar, lo bisa agak \"males\" tapi tetep bantuin
6. Jangan terlalu formal, santai aja kayak temen

Topik utama yang lo handle:
- Coding dan programming
- Tips belajar efektif
- Motivasi dan semangat belajar
- Rangkuman materi
- Bikin kuis dan soal latihan
- Jadwal belajar
- Mindset dan mental health untuk belajar
- Problem solving

Kalo user nanya hal yang ngak related sama belajar, lo bisa agak \"ogah\" tapi tetep kasih jawaban singkat.";

            // Gabungin system prompt dengan pesan user
            $fullPrompt = $systemPrompt . "\n\nUser: " . $request->input('message') . "\nZizi:";

            // Panggil Gemini API
            $response = Http::timeout(30)->post(
                'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . env('GEMINI_API_KEY'),
                [
                    "contents" => [
                        [
                            "parts" => [
                                ["text" => $fullPrompt]
                            ]
                        ]
                    ],
                    "generationConfig" => [
                        "temperature" => 0.7,
                        "topK" => 40,
                        "topP" => 0.95,
                        "maxOutputTokens" => 1024,
                    ]
                ]
            );

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    return response()->json([
                        'success' => true,
                        'message' => $data['candidates'][0]['content']['parts'][0]['text']
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Waduh, response dari AI aneh nih. Coba lagi deh! 😅'
                    ], 500);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'API lagi error bro, tunggu sebentar ya! 🔄'
                ], 500);
            }

        } catch (\Exception $e) {
            Log::error('Gemini API Error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Ada error nih! Coba lagi ya 😅'
            ], 500);
        }
    }
}
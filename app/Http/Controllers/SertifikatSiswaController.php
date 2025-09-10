<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserCertificate;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Storage;



class SertifikatSiswaController extends Controller
{

    public function index($kelasId)
    {
        $user = auth()->user();

        // Ambil kelas
        $kelas = Kelas::findOrFail($kelasId);

        // Cek apakah user sudah lulus / memenuhi syarat
        $canGraduate = $user->hasCompletedCourse($kelasId) && $user->averageQuizScore($kelasId) >= 70;

        // Cek apakah sudah ada sertifikat sebelumnya
        $existingCertificate = UserCertificate::where('user_id', $user->id)
                                ->where('kelas_id', $kelasId)
                                ->first();

        return view('desktop.pages.sertifikat.form-sertif', [
            'kelas' => $kelas,
            'canGraduate' => $canGraduate,
            'existingCertificate' => $existingCertificate,
        ]);
    }

    public function generate(Request $request, $kelasId)
    {
        $user = auth()->user();
        $kelas = Kelas::findOrFail($kelasId);
        $certificateNumber = 'CV-' . strtoupper(uniqid());

        return \Spatie\LaravelPdf\Facades\Pdf::view('desktop.pdf.sertifikat', [
            'fullName' => $request->full_name,
            'kelas' => $kelas,
            'certificateNumber' => $certificateNumber,
        ])
        ->format('a4')
        ->landscape()
        ->download('sertifikat_' . $kelasId . '.pdf');
    }

    public function download($filename)
    {
        $filePath = storage_path('app/public/sertifikat/' . $filename);
        
        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan');
        }
        
        return response()->download($filePath, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }

}

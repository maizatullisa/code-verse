<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelPdf\Facades\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class SertifikatSiswaController extends Controller
{

    public function index($kelasId)
    {
        $user = auth()->user();

        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('info', 'Silakan login terlebih dahulu untuk mendaftar kelas.');
        }
        
        $kelas = Kelas::findOrFail($kelasId);

        $canGraduate = $user->hasCompletedCourse($kelasId) && $user->averageQuizScore($kelasId) >= 70;

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
        $filename = 'sertifikat_' . $kelasId . '_' . $user->id . '_'. $certificateNumber . '.pdf';

        $imagePath = public_path('assets/images/sertifikat.png'); 
        $imageData = base64_encode(file_get_contents($imagePath));
        $backgroundImage = 'data:image/png;base64,' . $imageData;
        
    $qrSvg = QrCode::format('svg')->size(80)->generate(
        route('sertifikat.validasi', ['nomor' => $certificateNumber])
    );

    $qrCode = 'data:image/svg+xml;base64,' . base64_encode($qrSvg);

        Pdf::view('desktop.pdf.sertifikat', [
                'fullName' => $request->full_name,
                'kelas' => $kelas,
                'qrSvg' => $qrSvg,
                'certificateNumber' => $certificateNumber,
                'backgroundImage' => $backgroundImage, 
            ])
            ->format('a4')
            ->landscape()
            ->save(storage_path('app/public/sertifikat/' . $filename));

            UserCertificate::updateOrCreate(
                [
                    'user_id'  => $user->id,
                    'kelas_id' => $kelas->id, 
                ],
                [
                    'certificate_number' => $certificateNumber,
                    'filename' => $filename,
                    'file_path' => 'sertifikat/' . $filename,
                    'generated_at' => Carbon::now(),
                ]
            );

            return response()->download(
                storage_path('app/public/sertifikat/' . $filename),
                $filename,
                ['Content-Type' => 'application/pdf']
            );
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

            public function validasi($nomor)
        {
            $sertifikat = \App\Models\UserCertificate::where('certificate_number', $nomor)->first();

            if (!$sertifikat) {
                abort(404, 'Sertifikat tidak ditemukan.');
            }

            return view('desktop.pages.sertifikat.validasi', [
                'sertifikat' => $sertifikat,
            ]);
        }


}

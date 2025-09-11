<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\UserCertificate;
use App\Models\UserMateriProgress;
use Illuminate\Http\Request;

class AdminInfoSertifikatController extends Controller
{
    public function index()
    {
        // Ambil semua siswa
        $users = User::with(['userMateriProgress.materi.kelas'])->get();

        // Siapkan data untuk view
        $data = $users->map(function ($user) {
            $kelasList = Kelas::whereHas('materis', function ($q) use ($user) {
                $q->whereHas('userMateriProgress', function ($q2) use ($user) {
                    $q2->where('user_id', $user->id);
                });
            })->get();

            $kelasInfo = $kelasList->map(function ($kelas) use ($user) {
                $isCompleted = UserMateriProgress::isClassCompleted($user->id, $kelas->id);

                $certificate = UserCertificate::where('user_id', $user->id)
                                    ->where('kelas_id', $kelas->id)
                                    ->first();

                return [
                    'kelas_name' => $kelas->nama_kelas,
                    'progress_completed' => $isCompleted,
                    'certificate' => $certificate, // bisa null
                ];
            });

            return [
                'user_name' => $user->first_name,
                'kelas_info' => $kelasInfo,
            ];
        });

        return view('admin.sertifikat.index', [
            'data' => $data,
        ]);
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

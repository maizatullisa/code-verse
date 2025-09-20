<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\UserCertificate;
use App\Models\UserMateriProgress;
use Illuminate\Http\Request;

class AdminInfoSertifikatController extends Controller
{
    public function index(Request $request)
    {
       
        $search = $request->get('search');
        $statusFilter = $request->get('status_filter');
        $perPage = $request->get('per_page', 10);

        
        $usersQuery = User::with(['userMateriProgress.materi.kelas'])
            ->where('role', 'siswa'); // Hanya ambil siswa

        
        if ($search) {
            $usersQuery->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhereHas('userMateriProgress.materi.kelas', function($subQ) use ($search) {
                      $subQ->where('nama_kelas', 'like', "%{$search}%");
                  });
            });
        }

        $users = $usersQuery->get();

       
        $allData = collect();
        
        $users->each(function ($user) use (&$allData, $statusFilter) {
            $kelasList = Kelas::whereHas('materis', function ($q) use ($user) {
                $q->whereHas('userMateriProgress', function ($q2) use ($user) {
                    $q2->where('user_id', $user->id);
                });
            })->get();

            $kelasList->each(function ($kelas) use ($user, &$allData, $statusFilter) {
                $isCompleted = UserMateriProgress::isClassCompleted($user->id, $kelas->id);
                
               
                $shouldInclude = true;
                if ($statusFilter === 'completed' && !$isCompleted) {
                    $shouldInclude = false;
                } elseif ($statusFilter === 'belum' && $isCompleted) {
                    $shouldInclude = false;
                }

                if ($shouldInclude) {
                    $certificate = UserCertificate::where('user_id', $user->id)
                                        ->where('kelas_id', $kelas->id)
                                        ->first();

                    $allData->push([
                        'user_id' => $user->id,
                        'user_name' => $user->first_name,
                        'user_email' => $user->email,
                        'user_gender' => $user->gender,
                        'user_photo' => $user->profile_photo ? asset('storage/' . $user->profile_photo) : null,
                        'kelas_id' => $kelas->id,
                        'kelas_name' => $kelas->nama_kelas,
                        'progress_completed' => $isCompleted,
                        'certificate' => $certificate,
                    ]);
                }
            });
        });

        
        $currentPage = $request->get('page', 1);
        $total = $allData->count();
        $paginatedData = $allData->forPage($currentPage, $perPage);

        
        $groupedUsers = $allData->groupBy('user_id')->map(function ($userClasses, $userId) {
            $firstClass = $userClasses->first();
            return [
                'user_id' => $userId,
                'user_name' => $firstClass['user_name'],
                'user_email' => $firstClass['user_email'],
                'user_gender' => $firstClass['user_gender'],
                'user_photo' => $firstClass['user_photo'],
                'kelas_info' => $userClasses->map(function ($item) {
                    return [
                        'kelas_id' => $item['kelas_id'],
                        'kelas_name' => $item['kelas_name'],
                        'progress_completed' => $item['progress_completed'],
                        'certificate' => $item['certificate'],
                    ];
                })->values()
            ];
        })->values();

        
        $lastPage = ceil($total / $perPage);
        $from = ($currentPage - 1) * $perPage + 1;
        $to = min($currentPage * $perPage, $total);

        return view('admin.sertifikat.index', [
            'data' => $paginatedData,
            'groupedUsers' => $groupedUsers,
            'pagination' => [
                'current_page' => $currentPage,
                'last_page' => $lastPage,
                'per_page' => $perPage,
                'total' => $total,
                'from' => $from,
                'to' => $to,
            ],
            'filters' => [
                'search' => $search,
                'status_filter' => $statusFilter,
                'per_page' => $perPage,
            ]
        ]);
    }

    public function getStudentDetail($userId)
    {
        $user = User::with(['userMateriProgress.materi.kelas'])->find($userId);
        
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

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
                'kelas_id' => $kelas->id,
                'kelas_name' => $kelas->nama_kelas,
                'progress_completed' => $isCompleted,
                'certificate' => $certificate,
            ];
        });

        return response()->json([
            'user_id' => $user->id,
            'user_name' => $user->first_name,
            'user_email' => $user->email,
            'user_gender' => $user->gender,
            'kelas_info' => $kelasInfo,
        ]);
    }
}
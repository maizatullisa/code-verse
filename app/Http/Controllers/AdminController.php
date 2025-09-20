<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Kelas;
use App\Models\User; 
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalPengajar = User::where('role', 'pengajar')->count();
        $totalMateri = Materi::count();

        //mengambil 5  aktvts
        $recentActivities = $this->getRecentActivities();

        //statistik tambahan
        $todayRegistrations = User::whereDate('created_at', Carbon::today())->count();
        $weeklyGrowth = $this->getWeeklyGrowth();
        $pengajarWeeklyGrowth = $this->getPengajarWeeklyGrowth();
        $materiWeeklyGrowth = $this->getMateriWeeklyGrowth();
        $monthlyRegistrations = User::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        //statistik harian untuk siswa
        $todaySiswaRegistrations = User::where('role', 'siswa')
            ->whereDate('created_at', Carbon::today())
            ->count();
            
        //statistik harian untuk pengajar
        $todayPengajarRegistrations = User::where('role', 'pengajar')
            ->whereDate('created_at', Carbon::today())
            ->count();
            
        //statistik harian untuk materi/kelas
        $todayMateriCreated = Materi::whereDate('created_at', Carbon::today())
            ->count();
        
        return view('admin.dashboard-admin', compact(
            'users', 
            'totalSiswa',
            'totalPengajar', 
            'totalMateri',
            'recentActivities',
            'todayRegistrations',
            'todaySiswaRegistrations',
            'todayPengajarRegistrations',
            'todayMateriCreated',
            'weeklyGrowth',
            'pengajarWeeklyGrowth',
            'materiWeeklyGrowth',
            'monthlyRegistrations'
        ));
    }

        private function getRecentActivities()
    {
        $activities = collect();

        if (Schema::hasTable('activity_logs') && ActivityLog::count() > 0) {
            $logs = ActivityLog::with('user')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get()
                ->map(function($log) {
                    return [
                        'type' => $log->type ?? 'log',
                        'message' => $log->message,
                        'time' => $log->created_at->diffForHumans(),
                        'icon' => 'bell',
                        'color' => 'gray',
                        'created_at' => $log->created_at
                    ];
                });
            $activities = $activities->merge($logs);
        }

        // Siswa terbaru
        $newSiswa = User::where('role', 'siswa')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get()
            ->map(function($user) {
                return [
                    'type' => 'siswa_registered',
                    'message' => "New student '{$user->first_name}' registered as Siswa",
                    'time' => $user->created_at->diffForHumans(),
                    'icon' => 'user-plus',
                    'color' => 'blue',
                    'created_at' => $user->created_at
                ];
            });

        // Pengajar terbaru
        $newPengajar = User::where('role', 'pengajar')
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get()
            ->map(function($user) {
                return [
                    'type' => 'pengajar_registered',
                    'message' => "New instructor '{$user->first_name}' joined as Pengajar",
                    'time' => $user->created_at->diffForHumans(),
                    'icon' => 'user-check',
                    'color' => 'emerald',
                    'created_at' => $user->created_at
                ];
            });

        // Materi terbaru
        $newKelas = Kelas::orderBy('created_at', 'desc')
            ->limit(3)
            ->get()
            ->map(function($kelas) {
                return [
                    'type' => 'kelas_created',
                    'message' => "New Course '{$kelas->nama_kelas}' was created",
                    'time' => $kelas->created_at->diffForHumans(),
                    'icon' => 'book-open',
                    'color' => 'purple',
                    'created_at' => $kelas->created_at
                ];
            });

        // Merge semua dan sortir
        $activities = $activities
            ->merge($newSiswa)
            ->merge($newPengajar)
            ->merge($newKelas)
            ->sortByDesc('created_at')
            ->take(3);

        // Jika masih kosong, beri dummy
        if ($activities->isEmpty()) {
            $activities = collect([
                [
                    'type' => 'none',
                    'message' => 'No recent activity yet',
                    'time' => 'Just now',
                    'icon' => 'info',
                    'color' => 'gray',
                    'created_at' => now()
                ]
            ]);
        }

        return $activities;
}

  //pertumbuhan user dll
    private function getWeeklyGrowth()
    {
        $thisWeek = User::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
        
        $lastWeek = User::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();
        
       if ($lastWeek == 0) return $thisWeek > 0 ? 100 : 0;
        
        $growth = round((($thisWeek - $lastWeek) / $lastWeek) * 100, 1);
        return min($growth, 100);
    }

    
    //method untuk menghitung pertumbuhan pengajar mingguan
    private function getPengajarWeeklyGrowth()
    {
        $thisWeek = User::where('role', 'pengajar')
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])->count();
        
        $lastWeek = User::where('role', 'pengajar')
            ->whereBetween('created_at', [
                Carbon::now()->subWeek()->startOfWeek(),
                Carbon::now()->subWeek()->endOfWeek()
            ])->count();
        
        if ($lastWeek == 0) return $thisWeek > 0 ? 100 : 0;
        
        $growth = round((($thisWeek - $lastWeek) / $lastWeek) * 100, 1);
                return min($growth, 100);
    }

    //method untuk menghitung pertumbuhan materi mingguan
    private function getMateriWeeklyGrowth()
    {
        $thisWeek = Materi::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
        
        $lastWeek = Materi::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();

    if ($lastWeek == 0) return $thisWeek > 0 ? 100 : 0;
    $growth = round((($thisWeek - $lastWeek) / $lastWeek) * 100, 1);
    return min($growth, 100);
    }

    // untuk logging aktivitas
    private function logActivity($type, $message)
    {
        if (Schema::hasTable('activity_logs')) { 
            ActivityLog::create([
                'user_id' => auth()->id(),
                'type' => $type,
                'message' => $message,
                'created_at' => now()
            ]);
        }
    }
    
    //apiendpoint untuk emndpt aktivitas real-time
    public function getRecentActivitiesJson()
    {
        return response()->json($this->getRecentActivities());
    }
}

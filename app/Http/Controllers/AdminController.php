<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\User; 
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AdminController extends Controller
{
     /**
     * tampilkan semua user
     * Menampilkan 5 aktivitas recent user
     * ++registrasi hari ini
     * menampilkan statistik tambahan : registrasi hari ini, pertumbuhan per/minggu,dan +registrasi per/bln
     */
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

    /**
     * 
     * menampilkan aktivitas terbaru jnb
     */
    private function getRecentActivities()
    {
        //menggunakan tabel activity_logs
        if (Schema::hasTable('activity_logs')) {
            return ActivityLog::with('user')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        }
        

        $activities = collect(); 
        
        // sswa terbaru
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
        
        //pengajar terbaru
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
        
        // Materi/Kelas terbaru
        $newMateri = Materi::orderBy('created_at', 'desc')
            ->limit(3)
            ->get()
            ->map(function($materi) {
                return [
                    'type' => 'materi_created',
                    'message' => "New course '{$materi->title}' was created",
                    'time' => $materi->created_at->diffForHumans(),
                    'icon' => 'book-open',
                    'color' => 'purple',
                    'created_at' => $materi->created_at
                ];
            });

        
        // return $activities->merge($newUsers)->merge($newMateri)->take(5);
         return $activities
            ->merge($newSiswa)
            ->merge($newPengajar)
            ->merge($newMateri)
            ->sortByDesc('created_at')
            ->take(8);

    }

     /**
     * 
     * Menampilkan pertumbuhan  user, materi dan pengajar per minggu
     */
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
    public function create()
    {

    }
    // simpan user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:siswa,pengajar,admin',
            'gender' => 'required|in:male,female',
        ]);

        $user = User::create([ 
            'first_name' => $validated['first_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'gender' => $validated['gender'],
        ]);

        // Log aktivitas
        $this->logActivity('user_created', "Admin created new user: {$user->first_name}");

        return redirect()->route('admin.dashboard')->with('success', 'User berhasil ditambahkan.');
    }

    // untuk logging aktivitas
    private function logActivity($type, $message)
    {
        //tbl activity
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

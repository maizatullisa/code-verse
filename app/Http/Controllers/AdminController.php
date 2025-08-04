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
    public function index()//menampilkan semua users
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
        
        return view('admin.dashboard-admin', compact(
            'users', 
            'totalSiswa',
            'totalPengajar', 
            'totalMateri',
            'recentActivities',
            'todayRegistrations',
            'weeklyGrowth'
        ));
    }

    //ethod untuk mendapatkan recent activities
    private function getRecentActivities()
    {
        // Opsi 1: Jika menggunakan tabel activity_logs
        if (Schema::hasTable('activity_logs')) {
            return ActivityLog::with('user')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        }
        

        $activities = collect(); 
        
        //registrations terbaru
        $newUsers = User::orderBy('created_at', 'desc')
            ->limit(3)
            ->get()
            ->map(function($user) {
                return [
                    'type' => 'user_registered',
                    'message' => "New user '{$user->first_name}' registered",
                    'time' => $user->created_at->diffForHumans(),
                    'icon' => 'user-plus',
                    'color' => 'blue'
                ];
            });
        
        //m terbaru
        $newMateri = Materi::orderBy('created_at', 'desc')
            ->limit(2)
            ->get()
            ->map(function($materi) {
                return [
                    'type' => 'materi_created',
                    'message' => "New material '{$materi->title}' created",
                    'time' => $materi->created_at->diffForHumans(),
                    'icon' => 'book-open',
                    'color' => 'emerald'
                ];
            });
        
        return $activities->merge($newUsers)->merge($newMateri)->take(5);
    }

    //method untuk menghitung pertumbuhan mingguan
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
        
        if ($lastWeek == 0) return 0;
        
        return round((($thisWeek - $lastWeek) / $lastWeek) * 100, 1);
    }

    // form tambah user
    public function create()
    {
        return view('admin.user.create');
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

    // Method untuk logging aktivitas
    private function logActivity($type, $message)
    {
        // Jika menggunakan tabel activity_logs
        if (Schema::hasTable('activity_logs')) { 
            ActivityLog::create([
                'user_id' => auth()->id(),
                'type' => $type,
                'message' => $message,
                'created_at' => now()
            ]);
        }
    }
    
    //apiendpoint untuk emndpt aktivitas real-time (opsional)
    public function getRecentActivitiesJson()
    {
        return response()->json($this->getRecentActivities());
    }
}
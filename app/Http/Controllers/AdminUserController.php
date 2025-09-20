<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AdminUserController extends Controller
{
    public function index(Request $request)
   {
    $perPage = $request->get('per_page', 10);
    $search = $request->get('search');
    //ambil data user
   $query = User::where('role', 'siswa')
                    ->select('id', 'first_name', 'email', 'created_at', 'profile_photo')
                    ->oldest();
    if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        });
    }
   
    $users = $query->paginate($perPage);    
    $users->appends($request->query());

    $totalSiswa = User::where('role', 'siswa')->count();
    return view('admin.user.index', compact('users', 'totalSiswa', ));
   }
   
   public function edit(User $user)
{
    return view('admin.user.edit', compact('user'));
}
 
   public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,pengajar,siswa',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $userData = [
            'first_name' => $request->first_name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return redirect()->route('admin.user.index')
                        ->with('success', 'User berhasil diperbarui!');
    }

  
        public function destroy(User $user)
    {
        // Cegah admin menghapus dirinya sendiri
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.user.index')
                            ->with('error', 'Anda tidak bisa menghapus akun sendiri!');
        }

        $user->delete();

        return redirect()->route('admin.user.index')
                        ->with('success', 'User berhasil dihapus!');
    }

    public function download(Request $request)
    {
        $query = User::where('role', 'siswa');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
            });
        }

        $users = $query->select('id', 'first_name', 'email', 'created_at')->get();

        $filename = 'users_siswa_' . now()->format('Ymd_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($users) {
            $file = fopen('php://output', 'w');
            // Header CSV
            fputcsv($file, ['ID', 'Nama', 'Email', 'Tanggal Daftar']);
            // Data
            foreach ($users as $user) {
                fputcsv($file, [
                    $user->id,
                    $user->first_name,
                    $user->email,
                    $user->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

}

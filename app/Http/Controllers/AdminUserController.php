<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
   {
    //ambil data user
    $users = User::select('id', 'first_name', 'email', 'role')
                ->latest()
                ->get();

    $totalUser = User::count();
    $totalSiswa = User::where('role', 'siswa')->count();
    $totalPengajar = User::where('role', 'pengajar')->count();
    $totalAdmin = User::where('role', 'admin')->count();
    return view('admin.user.index', compact('users', 'totalSiswa', 'totalPengajar', 'totalAdmin', 'totalUser'));
   }
   //edit
   public function edit(User $user)
{
    return view('admin.user.edit', compact('user'));
}
   //update/update user
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

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return redirect()->route('admin.user.index')
                        ->with('success', 'User berhasil diperbarui!');
    }

    //hapus user
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

    //user kalo di 


}

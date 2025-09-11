<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AdminPengajarController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search');
        
        //ambil data user
        // $query = User::where('role', 'pengajar')
        $query = User::with('profilePengajar')
                     ->where('role', 'pengajar')
                    ->select('id', 'first_name', 'email', 'created_at')
                    ->oldest();
                    
        //search
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        });
    }
        //pagination
        $users = $query->paginate($perPage);
        
        //preserve query parameters untuk pagination
        $users->appends($request->query());

        $totalPengajar = User::where('role', 'pengajar')->count();
        return view('admin.pengajar.index', compact('users', 'totalPengajar'));
    }

    //edit
   public function edit(User $user)
    {
        return view('admin.pengajar.edit', compact('user'));
    }
   //update/update user
   public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:pengajar',
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

        return redirect()->route('admin.pengajar.index')
                        ->with('success', 'User berhasil diperbarui!');
    }

    //hapus user
        public function destroy(User $user)
    {
        // Cegah admin menghapus dirinya sendiri
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.pengajar.index')
                            ->with('error', 'Anda tidak bisa menghapus akun sendiri!');
        }

        $user->delete();

        return redirect()->route('admin.pengajar.index')
                        ->with('success', 'User berhasil dihapus!');
    }

    public function download(Request $request)
    {
        $query = User::where('role', 'pengajar')
                    ->select('id', 'first_name', 'email', 'created_at');

        // filter search jika ada
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $pengajars = $query->get();

        // buat CSV sederhana
        $csv = "ID,Name,Email,Created At\n";
        foreach ($pengajars as $p) {
            $csv .= "{$p->id},\"{$p->first_name}\",{$p->email},{$p->created_at}\n";
        }

        $fileName = 'pengajar_' . date('Y-m-d_H-i-s') . '.csv';
        return Response::make($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserMateriProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class UserProfileController extends Controller
{
    public function dashboardUserDesktop()
        {
            $user = auth()->user(); //mendapatkan user yg lgin

            return view('desktop.user-desktop', compact('user'));
        }

        public function edit()
    {
        $user = Auth::user();
        return view('desktop.edit-profil', compact('user'));
    }


     public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        //ubah
        $user->first_name = $request->first_name;
        $user->email = $request->email;
        if ($request->filled('current_password') && $request->filled('new_password')) {
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
        }

        if ($request->filled('current_password') && $request->filled('new_password')) {
            // Validasi password lama
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
            }

            // Update password baru
            $user->password = Hash::make($request->new_password); // Gunakan Hash::make() atau bcrypt()
        }
        if ($request->hasFile('profile_photo')) {
            //hapus fto lama
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            //smpan fto bru
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }


    }
}
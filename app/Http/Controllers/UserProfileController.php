<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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
        return view('desktop.update-siswa-profile', compact('user'));
    }


     public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Update nama
        $user->first_name = $request->first_name;

        // Kalau ada file foto baru
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama kalau ada
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Simpan file baru
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }


}

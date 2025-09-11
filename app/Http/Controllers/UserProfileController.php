<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserMateriProgress;
use App\Models\UserCertificate;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class UserProfileController extends Controller
{
public function dashboardUserDesktop()
{
    $user = auth()->user();
    
    $kelasList = CourseEnrollment::where('user_id', $user->id)
    ->with(['kelas.materis', 'kelas.pengajar'])
    ->get()
    ->map(fn($enrollment) => $enrollment->kelas) // ambil model kelas
    ->filter() // buang null
    ->map(function($kelas) {
        $kelas->durasi = $kelas->durasi ?? '8 minggu pembelajaran';
        return $kelas;
    });  

    // Sertifikat yang dimiliki
    $certificates = \App\Models\UserCertificate::where('user_id', $user->id)
        ->with('kelas')
        ->get();

    return view('desktop.user-desktop', compact('user', 'kelasList', 'certificates'));
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

        // Update nama & email
        $user->first_name = $request->first_name;
        $user->email = $request->email;

        //update password kalau diisi
        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
            }

            $user->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('profile_photo')) {
            // hapus foto lama kalau ada
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            // simpan foto baru
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle(Request $request)
    {
        $role = $request->get('role', 'siswa'); // Default ke siswa
        
        // Store role in session untuk dipakai di callback
        session(['google_login_role' => $role]);
        
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $role = session('google_login_role', 'siswa'); // Default ke siswa

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'first_name' => $googleUser->getName(), // Sesuaikan dengan field name kamu
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)),
                    'email_verified_at' => now(),
                    'role' => $role, // Set role berdasarkan pilihan user
                    'gender' => 'male', // Default, bisa diubah nanti di profile
                ]
            );

            // Jika user sudah ada tapi belum ada role, update rolenya
            if (!$user->role) {
                $user->update(['role' => $role]);
            }

            Auth::login($user);

            // Clear role dari session
            session()->forget('google_login_role');

            return redirect('/desktop/home-desktop')->with('success', 'Login Google berhasil! Selamat datang 🎉');
            
        } catch (\Exception $e) {
            return redirect('/desktop/lorek-desktop')->with('error', 'Login Google gagal! Silakan coba lagi.');
        }
    }
}
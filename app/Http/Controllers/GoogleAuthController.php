<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(Str::random(16)), // password random (tidak dipakai)
                    'email_verified_at' => now(),
                ]
            );

            Auth::login($user);

            return redirect('/home'); // sesuaikan tujuan setelah login
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Login Google gagal!');
        }
    }
}

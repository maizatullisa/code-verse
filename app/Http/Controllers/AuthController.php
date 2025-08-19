<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required|in:male,female',
            'role' => 'required|in:admin,pengajar,siswa',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'role' => $request->role,
        ]);
           $device = $request->input('device');
           // ahkan ke halaman berhasil sesuai device
            return $device === 'mobile'
                ? redirect('berhasil')->with('success', 'Registrasi berhasil!')
                : redirect('/desktop/lorek-desktop')->with('success', 'Registrasi berhasil! Silakan login.');
        }

            public function login(Request $request)
            {
                $credentials = $request->validate([
                    'email' => ['required', 'email'],
                    'password' => ['required'],
                ]);

                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();

                    $user = auth()->user();
                    $device = $request->input('device'); // mobile atau desktop

                    // Redirect berdasarkan role dan device
                    if ($user->role === 'admin') {
                        return redirect('/admin/dashboard');
                    } elseif ($user->role === 'pengajar') {
                        return redirect('/pengajar/dashboard');
                    } else {
                        return $device === 'mobile'
                            ? redirect()->route('home')
                            : redirect()->route('desktop.dashboard-user-desktop');
                    }
                }

                return back()->withErrors([
                    'email' => 'Email atau password salah.',
                ]);
            }



}



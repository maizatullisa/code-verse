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

        return redirect('/berhasil')->with('success', 'Registrasi berhasil!');
    }

            public function login(Request $request)
            {
                $credentials = $request->validate([
                    'email' => ['required', 'email'],
                    'password' => ['required'],
                ]);

                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();

                    // Redirect berdasarkan role
                    if (auth()->user()->role == 'admin') {
                        return redirect('/admin/dashboard');
                    } elseif (auth()->user()->role == 'pengajar') {
                        return redirect('/pengajar/dashboard');
                    } else {
                        return redirect()->route('/home');//aku ubah home
                    }
                }

                return back()->withErrors([
                    'email' => 'Email atau password salah.',
                ]);
            }

}



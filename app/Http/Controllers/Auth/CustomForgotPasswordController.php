<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use DB;

class CustomForgotPasswordController extends Controller
{
    // 1. Kirim OTP
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'Email tidak ditemukan'], 404);
        }

        $otp = rand(1000, 9999);

        DB::table('password_otps')->updateOrInsert(
            ['email' => $request->email, 'is_used' => false],
            [
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes(5),
                'created_at' => now(),
                'updated_at' => now(),
                'is_used' => false
            ]
        );

        Mail::to($request->email)->send(new PasswordOtpMail($otp));
        return response()->json(['message' => 'OTP terkirim']);
    }

    // 2. Verifikasi OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:4'
        ]);
        $otpRow = DB::table('password_otps')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('is_used', false)
            ->first();

        if (!$otpRow || Carbon::parse($otpRow->expires_at)->lt(now())) {
            return response()->json(['message' => 'OTP salah atau kadaluarsa!'], 400);
        }

        return response()->json(['message' => 'OTP valid']);
    }

    // 3. Ubah Password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:4',
            'new_password' => 'required|min:8|confirmed'
        ]);

        $otpRow = DB::table('password_otps')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('is_used', false)
            ->first();

        if (!$otpRow || Carbon::parse($otpRow->expires_at)->lt(now())) {
            return response()->json(['message' => 'OTP salah atau kadaluarsa!'], 400);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        DB::table('password_otps')
            ->where('id', $otpRow->id)
            ->update(['is_used' => true]);

        return response()->json(['message' => 'Password berhasil direset!']);
    }
}
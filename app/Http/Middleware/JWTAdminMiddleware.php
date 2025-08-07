<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

class JWTAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Get token from header or cookie
        $token = $request->bearerToken() ?? $request->cookie('admin_token');
        
        if (!$token) {
            return $this->unauthorizedResponse($request, 'Token tidak ditemukan');
        }

        // Verify token using AuthController method
        $authController = new AuthController();
        $decoded = $authController->verifyJWTToken($token);
        
        if (!$decoded) {
            return $this->unauthorizedResponse($request, 'Token tidak valid atau expired');
        }
        
        // Add user data to request
        $request->merge([
            'jwt_user_id' => $decoded->user_id,
            'jwt_email' => $decoded->email,
            'jwt_role' => $decoded->role,
            'jwt_name' => $decoded->first_name ?? null
        ]);
        
        return $next($request);
    }
    
    private function unauthorizedResponse($request, $message)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'redirect' => '/admin/login'
            ], 401);
        }
        
        return redirect('/admin/login')->with('error', $message);
    }
}
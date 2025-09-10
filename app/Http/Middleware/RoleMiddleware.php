<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = $request->user();

        if (!$user) {
            return redirect('/masuk'); // kalau belum login
        }

        if (strtolower($user->role) !== strtolower($role)) {
            abort(403, 'Akses ditolak untuk role ini.');
        }

        return $next($request);
    }
}

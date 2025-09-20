<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class NoCacheMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Hanya tambahkan header jika response yg support (Response/JsonResponse)
        if ($response instanceof Response || $response instanceof JsonResponse) {
            $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                     ->header('Pragma', 'no-cache')
                     ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
        }

        // Untuk BinaryFileResponse (download), biarkan default tanpa header anti-cache
        return $response;
    }
}
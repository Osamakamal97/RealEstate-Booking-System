<?php

namespace App\Http\Middleware;

use App\Models\BlockedUsers;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class CheckIfUserIsBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (env('APP_ENV') == 'productive') {
            $clientIP = FacadesRequest::getClientIp(true);
            $block = BlockedUsers::where('ip', $clientIP)->first();
            if ($block == null)
                return $next($request);
            return redirect()->route('welcome');
        }
        return $next($request);
    }
}

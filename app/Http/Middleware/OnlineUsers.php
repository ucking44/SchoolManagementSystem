<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Session;

class OnlineUsers
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
        if (Auth::check())
        {
            $userOnlineExpiredTime = Carbon::now()->addMinute(1);
            Cache::put('user-online' . Auth::user()->id, true, $userOnlineExpiredTime);
        }

        return $next($request);
    }
}

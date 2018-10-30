<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon ;
use Cache ; 
class detectOnlineUsers
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
        if(auth()->check()){
            $expireAt = Carbon::now()->addMinutes(5);
            Cache::put('user-online-'.auth()->user()->id, true, $expireAt);
        }
        return $next($request);
    }
}

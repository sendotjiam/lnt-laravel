<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // maunya untuk ngecek role dari user
        // $user = auth()->user();
        if (\Auth::check()) {
            if (\Auth::user()->role == 'admin') {
                return $next($request);
            }
        }
        // http code request
        // 403 -> forbidden page
        // 404 -> not found
        abort(403);
    }
}

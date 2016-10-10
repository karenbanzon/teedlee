<?php

namespace Teedlee\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRequire
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
        if( !Auth::check() || (Auth::check() && Auth::user()->user_group_id != 1) )
        {
            abort(403, 'You are not allowed to access this resource');
        }

        return $next($request);
    }
}

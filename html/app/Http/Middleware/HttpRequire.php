<?php

namespace Teedlee\Http\Middleware;

use Closure;

class HttpRequire
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
        if( $request->secure() )
        {
            return redirect(url($request->path(), [], false), 301);
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class httpHeaders
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
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        return $next($request);
    }
}

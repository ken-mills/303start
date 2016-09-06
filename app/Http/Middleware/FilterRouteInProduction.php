<?php

namespace App\Http\Middleware;

use Closure;

class FilterRouteInProduction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next )
    {

        abort_if( env('APP_ENV', 'production') == 'production', 403);

        return $next($request);

    }}

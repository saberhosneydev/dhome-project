<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Auth;
class AdminMiddleware
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
        if (Auth::user() && !$request->user()->is_admin)
        {
            return new Response(view('unauthorized'));

        }
        return $next($request);

    }
}


<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProducer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        //return $next($request);

        if (Auth::check() && Auth::user()->access_level_id == 2) {
            return $next($request);
        }
        return redirect('/')->with('unauthorizated', 'Permissão Negada!');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAccess
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
        if (Auth::user()->type == 'USER') {
            return redirect(route('dashboard'));
        }

        return $next($request);
    }
}

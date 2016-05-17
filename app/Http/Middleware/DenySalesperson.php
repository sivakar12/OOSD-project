<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class DenySalesperson
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
        if (Auth::user()->type == 'salesperson')
            return redirect('/denied');
        return $next($request);
    }
}
